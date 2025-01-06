<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY'); 

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'YOUR_TEMPLATE_ID';

try {
    $result = $apiInstance->download($template_id);    
    $outputFile = __DIR__ . '/template.pdf';
    file_put_contents($outputFile, $result);
    echo "Template downloaded successfully. Saved to: $outputFile\n";
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->download: ', $e->getMessage(), PHP_EOL;
}
