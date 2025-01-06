<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID'; 
$remove_authentication = new \BoldSign\Model\RemoveAuthentication(); 
$remove_authentication->setEmailId("email_example");
$remove_authentication->setZOrder(1);
try {
    $apiInstance->removeAuthentication($document_id, $remove_authentication);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->removeAuthentication: ', $e->getMessage(), PHP_EOL;
}
