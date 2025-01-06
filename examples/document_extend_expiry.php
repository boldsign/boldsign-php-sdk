<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID'; 
$extend_expiry = new \BoldSign\Model\ExtendExpiry(); 
$extend_expiry->setNewExpiryValue("2024-12-24");
try {
    $apiInstance->extendExpiry($document_id, $extend_expiry);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->extendExpiry: ', $e->getMessage(), PHP_EOL;
}
