<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

try {
    $apiInstance->getSenderIdentityProperties("YOUR_SENDER_IDENTITY_ID");
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->updateSenderIdentities: ', $e->getMessage(), PHP_EOL;
}