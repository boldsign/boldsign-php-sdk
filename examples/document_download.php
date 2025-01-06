<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
$on_behalf_of = 'email_example';
try {
    $result = $apiInstance->downloadDocument($document_id, $on_behalf_of);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->downloadDocument: ', $e->getMessage(), PHP_EOL;
}
