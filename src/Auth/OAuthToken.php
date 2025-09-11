<?php

namespace BoldSign\Auth;

/**
 * Class OAuthToken
 *
 * Represents an OAuth access token along with its associated metadata.
 */
class OAuthToken
{
    /** @var string $accessToken The OAuth access token used for authentication. */
    public string $accessToken;

    /** @var string $tokenType The type of token (e.g., "Bearer"). */
    public string $tokenType;

    /** @var string|null $refreshToken The refresh token used to obtain a new access token when expired. */
    public ?string $refreshToken;

    /** @var int $expiresIn The lifespan in how many seconds, when the token will expire. */
    public int $expiresIn;

    /** @var string $scope The scope used to access level of privacy in the OAuth App. */
    public string $scope;

    /**
     * OAuthToken Constructor
     *
     * @param string $accessToken The OAuth access token.
     * @param string $tokenType The type of token, usually "Bearer".
     * @param int $expiresIn The lifespan of the token in seconds.
     * @param string|null $refreshToken The refresh token (optional).
     */

    public function __construct(string $accessToken, string $tokenType, int $expiresIn, string $scope, ?string $refreshToken = null)
    {
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->refreshToken = $refreshToken;
        $this->expiresIn = $expiresIn;
        $this->scope = $scope;
    }

    /**
     * Creates an OAuthToken object from an API response.
     *
     * @param array $response The API response containing token details.
     * @return OAuthToken A new OAuthToken instance.
     * @throws \Exception If required fields are missing from the response.
     */

    public static function fromResponse(array $response): OAuthToken
    {
        if (!isset($response['access_token']) || !isset($response['expires_in'])) {
            throw new \Exception("Invalid response: 'access_token' and 'expires_in' are required.");
        }

        return new self(
            $response['access_token'],
            $response['token_type'] ?? 'Bearer',
            $response['expires_in'],
            $response['scope'],
            $response['refresh_token'] ?? null
        );
    }

    /**
     * Converts the OAuthToken object into a human-readable string.
     *
     * @return string A string representation of the token.
     */

    public function __toString(): string
    {
        return sprintf(
            "Access Token: %s, Token Type: %s, Expires In: %s, Scope: %s, Refresh Token: %s",
            $this->accessToken,
            $this->tokenType,
            $this->expiresIn,
            $this->scope,
            $this->refreshToken ?? 'None'
        );
    }
}
