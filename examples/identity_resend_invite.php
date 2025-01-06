<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

$email = 'email_example';
try {
    $apiInstance->resendInvitationSenderIdentities($email);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->resendInvitationSenderIdentities: ', $e->getMessage(), PHP_EOL;
}