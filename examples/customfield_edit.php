<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\CustomFieldApi($config);

$custom_field_id = 'Your custom field ID';
$brand_custom_field_details = new \BoldSign\Model\BrandCustomFieldDetails();

// Set custom field details for editing
$brand_custom_field_details->setFieldName('Field Name');
$brand_custom_field_details->setFieldDescription('Details');
$brand_custom_field_details->setFieldOrder(1);
$brand_custom_field_details->setBrandId('Your Brand ID');
$brand_custom_field_details->setSharedField(true);

// FormField
$formField = new \BoldSign\Model\CustomFormField();
$formField->setFieldType('Signature');
$formField->setPlaceholder('Enter custom field details');
$formField->setIsRequired(true);
$brand_custom_field_details->setFormField($formField);
try {
    $result = $apiInstance->editCustomField($custom_field_id, $brand_custom_field_details);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldApi->editCustomField: ', $e->getMessage(), PHP_EOL;
}
