<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\ContactsApi($config);

// Contact ID to delete
$contactId = 'YOUR_CONTACT_ID';
try {
    $apiInstance->deleteContacts($contactId);
    echo "Contact deleted successfully.";
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->deleteContact: ', $e->getMessage(), PHP_EOL;
}
