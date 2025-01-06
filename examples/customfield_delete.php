<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\CustomFieldApi($config);

//Custom field to be deleted
$custom_field_id = 'Custom field ID';
try {
    $result = $apiInstance->deleteCustomField($custom_field_id);
    echo 'Custom field deleted successfully';
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldApi->deleteCustomField: ', $e->getMessage(), PHP_EOL;
}
