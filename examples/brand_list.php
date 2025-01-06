<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\BrandingApi($config);
try {
    $result = $apiInstance->brandList();
    echo 'Brand list: ', json_encode($result), PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling BrandingApi->brandList: ', $e->getMessage(), PHP_EOL;
}
