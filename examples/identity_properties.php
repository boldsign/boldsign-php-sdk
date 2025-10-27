<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

try {
    $result = $apiInstance->getSenderIdentityProperties("SENDER_IDENTITY_ID");
    echo 'Sender Identity property:', $result;
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->getSenderIdentityProperties: ', $e->getMessage(), PHP_EOL;
}