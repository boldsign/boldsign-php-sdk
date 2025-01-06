<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\PlanApi($config);

try {
    $result = $apiInstance->apiCreditsCount();
} catch (Exception $e) {
    echo 'Exception when calling PlanApi->apiCreditsCount: ', $e->getMessage(), PHP_EOL;
}