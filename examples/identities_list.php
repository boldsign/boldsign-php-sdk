<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\SenderIdentitiesApi($config);

$page = 1;
$page_size = 10;
$brand_id = 'YOUR_BRAND_ID';
try {
    $result = $apiInstance->listSenderIdentities($page, $page_size, $brand_id);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->listSenderIdentities: ', $e->getMessage(), PHP_EOL;
}

