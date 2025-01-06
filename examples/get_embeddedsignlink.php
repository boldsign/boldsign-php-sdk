<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID'; 
$signer_email = 'hankwhite@cubeflakes.com'; 
$country_code = '+1'; 
$phone_number = '2015550124'; 
$sign_link_valid_till = '12/24/2024';
$redirect_url = 'https://staging-app.boldsign.com'; 
try {
    $result = $apiInstance->getEmbeddedSignLink($document_id, $signer_email, $country_code, $phone_number, $sign_link_valid_till, $redirect_url);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->getEmbeddedSignLink: ', $e->getMessage(), PHP_EOL;
}