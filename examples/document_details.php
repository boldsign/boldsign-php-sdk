<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
try {
    $result = $apiInstance->getProperties($document_id);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->getProperties: ', $e->getMessage(), PHP_EOL;
}
