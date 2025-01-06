<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'Template ID';
try {
    $apiInstance->deleteTemplate($template_id);
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->deleteTemplate: ', $e->getMessage(), PHP_EOL;
}
