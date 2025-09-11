<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Auth/OAuthClient.php';

use BoldSign\Auth\OAuthClient;

// Step 2: Initialize OAuthClient
$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_CLIENT_SECRET_ID';
$scope = 'BoldSign.Documents.All';

$oauthClient = new OAuthClient(
    $clientId,
    $clientSecret,
    $scope
);

$token = $oauthClient->getTokenWithClientCredentials();

$expiresAt = time() + $token->expiresIn;
if (time() > $expiresAt && !empty($token->refreshToken)) {
    $token = $oauthClient->getTokenWithClientCredentials();
}

// Step 5: Use Access Token to make API calls
$config = new BoldSign\Configuration();
$config->setAccessToken($token->accessToken);

$apiInstance = new BoldSign\Api\BrandingApi($config);
$result = $apiInstance->brandList();