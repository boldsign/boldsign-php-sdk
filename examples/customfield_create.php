<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\CustomFieldApi($config);

// Create an instance of Brand Custom Field
$brand_custom_field_details = new \BoldSign\Model\BrandCustomFieldDetails();

// Brand Custom Field details
$brand_custom_field_details->setFieldName('name');
$brand_custom_field_details->setFieldDescription('New custom field details');
$brand_custom_field_details->setFieldOrder(2);
$brand_custom_field_details->setBrandId('Your Brand ID');
$brand_custom_field_details->setSharedField(true);

// FormField instance
$formField = new \BoldSign\Model\CustomFormField();
$formField->setFieldType('Signature');
$formField->setPlaceholder('Enter custom field details');
$formField->setIsRequired(true);

$brand_custom_field_details->setFormField($formField);
try {
    $result = $apiInstance->createCustomField($brand_custom_field_details);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldApi->createCustomField: ', $e->getMessage(), PHP_EOL;
}
