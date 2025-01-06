<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY'); 

$apiInstance = new BoldSign\Api\TemplateApi($config);

$templateTag = new BoldSign\Model\TemplateTag();
$templateTag->setTemplateId('TEMPLATE_ID'); 
$templateTag->setDocumentLabels(['test1', 'api1']);
$templateTag->setTemplateLabels(['test', 'api']);
try {
    $apiInstance->addTag($templateTag);
    echo 'Tag added successfully.';
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->addTag: ', $e->getMessage(), PHP_EOL;
}
