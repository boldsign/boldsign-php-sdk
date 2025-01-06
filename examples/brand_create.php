<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\BrandingApi($config);

$brand_name = 'Name';
$brand_logo = "../tests/data/sample.jpg";
$background_color = 'Blue';
$button_color = 'Black';
$button_text_color = 'White';
$email_display_name = 'email_example';
try {
    $result = $apiInstance->createBrand($brand_name, $brand_logo, $background_color, $button_color, $button_text_color, $email_display_name);
    echo 'Brand created successfully: ', $result->getBrandId(), PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling BrandingApi->createBrand: ', $e->getMessage(), PHP_EOL;
}
