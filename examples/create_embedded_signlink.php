<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

// Create a request object for the embedded signing link
$embedded_sign_request = new \BoldSign\Model\EmbeddedSigningLink();
$document_id = "YOUR_DOCUMENT_ID";
$signing_email = "hankyWhites@cubeflakes.com";
$url= "https://www.syncfusion.com/";

try {
    // Call the API to generate the embedded signing link
    $result = $apiInstance->getEmbeddedSignLink($document_id, $signing_email,$redirect_url=$url);

    // Extract the embedded signing link
    $embedded_sign_url = $result->getSignLink();

    echo "Embedded Signing URL: " . $embedded_sign_url;
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->createEmbeddedSignLink: ', $e->getMessage(), PHP_EOL;
}
