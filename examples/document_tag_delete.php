<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_tags = new \BoldSign\Model\DocumentTags(); 
$document_tags->setDocumentId("YOUR_DOCUMENT_ID");
$document_tags->setTags(["tag1", "tag2"]);
try {
    $apiInstance->deleteTag($document_tags);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->deleteTag: ', $e->getMessage(), PHP_EOL;
}