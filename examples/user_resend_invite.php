<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\UserApi($config);

$user_id = 'YOUR_USER_ID';
try {
    $apiInstance->resendInvitation($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->resendInvitation: ', $e->getMessage(), PHP_EOL;
}