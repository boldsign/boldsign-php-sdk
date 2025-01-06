<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

$create_sender_identity_request = new \BoldSign\Model\CreateSenderIdentityRequest();
$create_sender_identity_request->setName("Name");
$create_sender_identity_request->setEmail("email_example");
$create_sender_identity_request->setRedirectUrl("https://boldsign.com");
$create_sender_identity_request->setBrandId("YOUR_BRAND_ID");
try {
    $apiInstance->createSenderIdentities($create_sender_identity_request);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->createSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
