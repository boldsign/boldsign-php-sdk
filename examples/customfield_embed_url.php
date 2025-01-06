<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\CustomFieldApi($config);

$brand_id = 'YOUR_BRAND_ID';

try {
    $result = $apiInstance->embedCustomField($brand_id);
    echo $result->getCreateUrl();
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldApi->embedCustomField: ', $e->getMessage(), PHP_EOL;
}
