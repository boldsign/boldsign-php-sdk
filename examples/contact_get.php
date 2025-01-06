<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

// Create an instance of the Contacts API
$apiInstance = new BoldSign\Api\ContactsApi($config);

// Contact ID to retrieve details for
$contactId = 'YOUR_CONTACT_ID';
try {
    $result = $apiInstance->getContact($contactId);
    echo 'Contact details: ' . $result;
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->getContact: ', $e->getMessage(), PHP_EOL;
}
