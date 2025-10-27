<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

try {
    $apiInstance->draftSend($document_id = 'YOUR_DOCUMENT_ID');
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->EditDocument: ', $e->getMessage(), PHP_EOL;
}