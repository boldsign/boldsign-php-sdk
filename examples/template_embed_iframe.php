<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'YOUR_TEMPLATE_ID';
$embedded_template_edit_request = new \BoldSign\Model\EmbeddedTemplateEditRequest();
$embedded_template_edit_request->setLinkValidTill('2024-12-24');
$embedded_template_edit_request->setOnBehalfOf('email_example');
try {    
    $result = $apiInstance->getEmbeddedTemplateEditUrl($template_id, $embedded_template_edit_request);    
    $embedded_url = $result->getEditUrl();
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->getEmbeddedTemplateEditUrl: ', $e->getMessage(), PHP_EOL;
}
