<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

try {
    $result = $apiInstance->listTemplates($page=1);
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->listTemplates: ', $e->getMessage(), PHP_EOL;
}
