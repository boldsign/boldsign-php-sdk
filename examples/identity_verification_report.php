<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
$apiInstance = new BoldSign\Api\IdentityVerificationApi($config);
$document_id = "YOUR_DOCUMENT_ID";
$verification_report_request  = new \BoldSign\Model\VerificationDataRequest();
$verification_report_request ->setEmailId("sivaramani.sivaraj@syncfusion.com");
$verification_report_request ->setCountryCode("+91");
$verification_report_request ->setPhoneNumber("9876543210");
$verification_report_request ->setOrder(1);

try {

    $result = $apiInstance->report($document_id, $verification_report_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IdentityVerificationApi->image: ', $e->getMessage(), PHP_EOL;
}