<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\ContactsApi($config);
$contact = new \BoldSign\Model\ContactDetails();
$contact->setName('name');
$contact->setEmail('email@example.com');
$contact_details = array($contact);
try {
    $result = $apiInstance->createContact($contact_details);
    echo 'Contacts created successfully: ' . $result;
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
}
