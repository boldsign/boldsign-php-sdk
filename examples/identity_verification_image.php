<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\IdentityVerificationApi($config);
$document_id = "YOUR_DOCUMENT_ID";
$image_request  = new \BoldSign\Model\DownloadImageRequest();
$image_request ->setEmailId("sivaramani.sivaraj@syncfusion.com");
$image_request ->setCountryCode("+91");
$image_request ->setPhoneNumber("9876543210");
$image_request->setFileId("YOUR_FILE_ID");
$image_request ->setOrder(1);

try {

    $result = $apiInstance->image($document_id, $image_request );
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IdentityVerificationApi->report: ', $e->getMessage(), PHP_EOL;
}