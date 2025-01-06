<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\CustomFieldApi($config);
$brand_id = 'YOUR_BRAND_ID';
try {
    $result = $apiInstance->customFieldsList($brand_id);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldApi->customFieldsList: ', $e->getMessage(), PHP_EOL;
}