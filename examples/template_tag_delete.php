<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY'); 

$apiInstance = new BoldSign\Api\TemplateApi($config);

$templateId = 'YOUR_TEMPLATE_ID'; 
$tagToDelete = 'tag1';
$templateTag = new \BoldSign\Model\TemplateTag();
$templateTag->setTemplateId($templateId);
$templateTag->setTemplateLabels([$tagToDelete]);
try {
    $apiInstance->deleteTag($templateTag);
    echo 'Tag deleted successfully.';
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->deleteTemplateTag: ', $e->getMessage(), PHP_EOL;
}
