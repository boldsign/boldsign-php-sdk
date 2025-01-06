<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$document_id = 'YOUR_DOCUMENT_ID';

//Prefill Field
$prefillField = new \BoldSign\Model\PrefillField();
$prefillField->setId("field_id");
$prefillField->setValue("ON");
$prefill_field_request = new \BoldSign\Model\PrefillFieldRequest();
$prefill_field_request->setFields([$prefillField]);
try {
    $apiInstance->prefillFields($document_id, $prefill_field_request);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->prefillFields: ', $e->getMessage(), PHP_EOL;
}
