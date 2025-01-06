<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
$access_code_detail = new \BoldSign\Model\AccessCodeDetail();
$access_code_detail->setAuthenticationType("AccessCode");
$access_code_detail->setAccessCode("Your code");
$access_code_detail->setEmailId("email example");
try {
    $apiInstance->addAuthentication($document_id, $access_code_detail);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->addAuthentication: ', $e->getMessage(), PHP_EOL;
}