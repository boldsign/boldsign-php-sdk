<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

$email = 'example@gmail.com';
$edit_sender_identity_request = new \BoldSign\Model\EditSenderIdentityRequest(); 
$edit_sender_identity_request->setName('Name update');
$edit_sender_identity_request->setRedirectUrl('https://boldsign.com');
try {
    $apiInstance->updateSenderIdentities($email, $edit_sender_identity_request);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->updateSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
