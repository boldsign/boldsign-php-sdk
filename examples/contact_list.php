<?php

use BoldSign\Model\ContactsList;

require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

// Create an instance of the Contacts API
$apiInstance = new BoldSign\Api\ContactsApi($config);

$page = 1;
$page_size = 10;
try {
    $contactListResponse = $apiInstance->contactUserList($page, $page_size);
    $contactsList = $contactListResponse->getResult();
    foreach ($contactsList as $contact) {
        echo 'Contact: ' . $contact->getName() . ' - Email: ' . $contact->getEmail() . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactUserList: ', $e->getMessage(), PHP_EOL;
}
