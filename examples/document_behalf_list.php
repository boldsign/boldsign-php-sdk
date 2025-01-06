<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);
try {    
    $result = $apiInstance->behalfDocuments($page = 1);
    echo json_encode($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->behalfDocuments: ', $e->getMessage(), PHP_EOL;
}
