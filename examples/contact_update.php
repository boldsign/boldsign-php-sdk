<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

// Create an instance of the Contacts API
$apiInstance = new BoldSign\Api\ContactsApi($config);

// Contact details to update
$contactId = 'YOUR_CONTACT_ID';
$contact = new \BoldSign\Model\ContactDetails(); 
$contact->setName("new name");
$contact->setEmail("example1@cubeflakes.com");
try {
    // Call the update contact API
    $apiInstance->updateContact($contactId, $contact);
    echo 'Contact updated successfully.';
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->updateContact: ', $e->getMessage(), PHP_EOL;
}
