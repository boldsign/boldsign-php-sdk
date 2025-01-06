<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
$access_code_details = new \BoldSign\Model\AccessCodeDetails();
$access_code_details->setAccessCode("New access code");
$email_id = 'email_example'; 
$z_order = 1; 
try {
    $apiInstance->changeAccessCode($document_id, $access_code_details, $email_id, $z_order);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->changeAccessCode: ', $e->getMessage(), PHP_EOL;
}
