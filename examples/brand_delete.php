<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\BrandingApi($config);

$brand_id = 'YOUR_BRAND_ID';
try {
    $result = $apiInstance->deleteBrand($brand_id);
    echo 'Brand deleted successfully: ', $result, PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling BrandingApi->deleteBrand: ', $e->getMessage(), PHP_EOL;
}
