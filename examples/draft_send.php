<?php
require_once(__DIR__ . '/../vendor/autoload.php');
// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
$apiInstance = new BoldSign\Api\DocumentApi($config);
try {
    $apiInstance->draftSend("DRAFT_DOCUMENT_ID");
    echo 'Successfully sent the draft document';
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->draftSend: ', $e->getMessage(), PHP_EOL;
}
