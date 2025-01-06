<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'YOUR_TEMPLATE_ID';
try {
    $result = $apiInstance->getProperties($template_id);
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->getProperties: ', $e->getMessage(), PHP_EOL;
}