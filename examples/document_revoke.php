<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY'); 

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
$revoke_document = new \BoldSign\Model\RevokeDocument();
$revoke_document->setMessage("The document was revoked due to an error.");
try {
    $apiInstance->revokeDocument($document_id, $revoke_document);
    echo 'Document revoked successfully.';
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->revokeDocument: ', $e->getMessage(), PHP_EOL;
}
