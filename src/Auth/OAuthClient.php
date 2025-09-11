<?php

namespace BoldSign\Auth;

use BoldSign\Auth\OAuthToken;
use BoldSign\Auth\PKCEHelper;
use Exception;

/**
 * Represents available regions for BoldSign API endpoints.
 */
class Region
{
    public const US = 'https://account.boldsign.com';
    public const EU = 'https://account-eu.boldsign.com';
    public const CA = 'https://account-ca.boldsign.com';
}
/**
 * Class OAuthClient
 *
 * Provides helper methods for OAuth 2.0 authentication, including authorization code flow,
 * client credentials flow, and token refresh mechanisms.
 */
class OAuthClient
{
    /** @var string $clientId The client ID for OAuth authentication. */
    private string $clientId;

    /** @var string $clientSecret The client secret for client credentials flow (optional). */
    private string $clientSecret;

    /** @var string|null $redirectUri The redirect URI registered with the OAuth provider. */
    private ?string $redirectUri;

    /** @var string $scope The scope of access requested. */
    private? string $scope;

    /** @var string|null $codeChallenge The PKCE code challenge for security (optional). */
    private ?string $codeChallenge;

    /** @var string|null $codeVerifier The PKCE code verifier used during token exchange (optional). */
    private ?string $codeVerifier;

    /** @var string|null $state The state parameter for OAuth flow (optional). */
    private ?string $state;

    /** @var string|null $region The region for the auth endpoint (optional). */
    private ?string $region;

    /** @var string $authEndpoint The base authorization endpoint URL. */
    private string $authEndpoint = Region::US;

    /** @var array Default PKCE codes */
    private static $defaultPKCECodes = null;
    /**
     * Get or generate default PKCE codes
     * @return array The PKCE codes
     */
    private static function getDefaultPKCECodes(): array
    {
        if (self::$defaultPKCECodes === null) {
            self::$defaultPKCECodes = PKCEHelper::generatePKCECodes();
        }
        return self::$defaultPKCECodes;
    }
   
    /**
     * OAuthClient constructor.
     *
     * Initializes the OAuth helper with client credentials and PKCE parameters.
     *
     * @param string $clientId The client ID for OAuth authentication.
     * @param string $clientSecret The client secret (optional for public clients).
     * @param string|null $scope The requested scope (optional).
     * @param string|null $redirectUri The registered redirect URI (optional).
     * @param string|null $state The state parameter for OAuth flow (optional).
     * @param string|null $region The region for the auth endpoint (optional).
     * @param string|null $codeVerifier The PKCE code verifier (optional).
     * @param string|null $codeChallenge The PKCE code challenge (optional).
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        ?string $scope,
        ?string $redirectUri = null,
        ?string $state = null,
        ?string $region = null,
        ?string $codeVerifier = null,
        ?string $codeChallenge = null
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->scope = $scope;
        $this->state = $state;
        $this->region = $region;
        $this->codeVerifier = $codeVerifier;
        $this->codeChallenge = $codeChallenge;

        // Initialize PKCE codes if needed
        self::getDefaultPKCECodes();
    }

    /**
     * Generates the OAuth authorization URL for user login and consent.
     *
     * @param string|null $state The state parameter to include in the request.
     * @return string The generated authorization URL.
     */
    public function getAuthorizationUrl(?string $state = null): string
    {
        $useCodeChallenge = $this->codeChallenge;
        if ($useCodeChallenge === null) {
            $useCodeChallenge = self::getDefaultPKCECodes()['code_challenge'];
        }
        $params = [
            'response_type' => 'code',
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'scope' => $this->scope,
            'code_challenge' => $useCodeChallenge,
            'code_challenge_method' => 'S256'
        ];

        if ($state !== null) {
            $params['state'] = $state;
        } else if ($this->state !== null) {
            $params['state'] = $this->state;
        }

        $endpoint = $this->region ?? $this->authEndpoint;

        return "{$endpoint}/connect/authorize?" . http_build_query($params);
    }

    /**
     * Exchanges an authorization code for an access token.
     *
     * @param string $code The authorization code obtained after user login.
     * @return OAuthToken The obtained access token and related details.
     * @throws Exception If the request fails.
     */
    public function exchangeCodeForToken(string $code): OAuthToken
    {
        $useCodeVerifier = $this->codeVerifier;
        if ($useCodeVerifier === null) {
            $useCodeVerifier = self::getDefaultPKCECodes()['code_verifier'];
        }

        $postData = [
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'redirect_uri' => $this->redirectUri,
            'code_verifier' => $useCodeVerifier
        ];

        $endpoint = $this->region ?? $this->authEndpoint;

        return $this->requestToken("{$endpoint}/connect/token", $postData);
    }

    /**
     * Obtains an access token using the client credentials flow.
     *
     * @return OAuthToken The obtained access token.
     * @throws Exception If the request fails.
     */
    public function getTokenWithClientCredentials(): OAuthToken
    {
        $postData = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => $this->scope,
        ];

        $endpoint = $this->region ?? $this->authEndpoint;

        return $this->requestToken("{$endpoint}/connect/token", $postData);
    }

    /**
     * Refreshes an expired access token using a refresh token.
     *
     * @param string $refreshToken The refresh token obtained during initial authorization.
     * @return OAuthToken The new access token.
     * @throws Exception If the request fails.
     */
    public function refreshAccessToken(string $refreshToken): OAuthToken
    {
        $postData = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $refreshToken
        ];

        $endpoint = $this->region ?? $this->authEndpoint;

        return $this->requestToken("{$endpoint}/connect/token", $postData);
    }

    /**
     * Sends an HTTP request to retrieve an OAuth token.
     *
     * @param string $tokenEndpoint The OAuth token endpoint URL.
     * @param array $postData The POST request payload.
     * @return OAuthToken The parsed OAuth token.
     * @throws Exception If the request fails.
     */
    private function requestToken(string $tokenEndpoint, array $postData): OAuthToken
    {
        $ch = curl_init($tokenEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            throw new Exception("Failed to retrieve token: HTTP $httpCode - " . ($response ?: 'No response'));
        }

        $responseData = json_decode($response, true);

        return OAuthToken::fromResponse($responseData);
    }
}