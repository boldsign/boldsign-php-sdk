<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';
$receiver_emails = array('emails');
$reminder_message = new \BoldSign\Model\ReminderMessage();
try {
    $apiInstance->remindDocument($document_id, $receiver_emails, $reminder_message);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->remindDocument: ', $e->getMessage(), PHP_EOL;
}
