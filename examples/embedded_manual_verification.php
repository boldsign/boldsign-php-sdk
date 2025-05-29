<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\IdentityVerificationApi($config);
$document_id = "YOUR_DOCUMENT_ID";
$embedded_manual_verification_request = new \BoldSign\Model\EmbeddedFileDetails();
$embedded_manual_verification_request->setEmailId("sivaramani.sivaraj@syncfusion.com");
$embedded_manual_verification_request->setCountryCode("+91");
$embedded_manual_verification_request->setPhoneNumber("9876543210");
$embedded_manual_verification_request->setOrder(1);
$embedded_manual_verification_request->setRedirectUrl("www.boldsign.com");

try {

    $result = $apiInstance->createEmbeddedVerificationUrl($document_id, $embedded_manual_verification_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IdentityVerificationApi->embeddedManualVerification: ', $e->getMessage(), PHP_EOL;
}