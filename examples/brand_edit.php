<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\BrandingApi($config);

$brand_id = 'YOUR_BRAND_ID';
$brand_name = 'Name';
$brand_logo = "../tests/data/sample.jpg";
$background_color = 'Blue';
$button_color = 'Black';
$button_text_color = 'White';
$email_display_name = 'email_example';
$document_expiry_settings_enable_default_expiry_alert = True;
$document_expiry_settings_enable_auto_reminder = True;
$document_expiry_settings_reminder_days = 30;
try {
    $result = $apiInstance->editBrand($brand_id, $brand_name, $brand_logo, $background_color, $button_color, $button_text_color, $email_display_name, $document_expiry_settings_enable_default_expiry_alert, $document_expiry_settings_enable_auto_reminder, $document_expiry_settings_reminder_days);
    echo 'Brand edited successfully: ', $result, PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling BrandingApi->editBrand: ', $e->getMessage(), PHP_EOL;
}
