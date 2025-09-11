<?php

use BoldSign\Auth\PKCEHelper;
require_once(__DIR__ . '/../vendor/autoload.php');
require_once __DIR__ . '/../src/Auth/OAuthClient.php';
use BoldSign\Auth\Region;
use BoldSign\Auth\OAuthClient;

// Step 1: Initialize OAuthClient
$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_CLIENT_SECRET_ID';
$redirectUri = 'YOUR_REDIRECT_URI';
$scope = 'openid profile email offline_access BoldSign.Documents.All';


$oauthClient = new OAuthClient(
    $clientId,
    $clientSecret,
    $scope,
    $redirectUri,
    "YOUR_STATE",
    Region::US,
);
// Step 2: Get Authorization URL, get code from the redirect URI after user login
$authUrl = $oauthClient->getAuthorizationUrl();
echo "Authorization URL: $authUrl\n";
// Step 3: Exchange Authorization Code for Access Token
$code = 'YOUR_AUTH_URL';
$token = $oauthClient->exchangeCodeForToken($code);

$expiresAt = time() + $token->expiresIn;
if (time() > $expiresAt && !empty($token->refreshToken)) {
    $token = $oauthClient->refreshAccessToken($token->refreshToken);
}

// Step 4: Use Access Token to make API calls
$config = new BoldSign\Configuration();
$config->setAccessToken($token->accessToken);

$apiInstance = new BoldSign\Api\BrandingApi($config);
$result = $apiInstance->brandList();
