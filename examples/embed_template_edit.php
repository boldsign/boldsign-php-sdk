<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'Template ID';
$embedded_template_edit_request = new \BoldSign\Model\EmbeddedTemplateEditRequest();
$embedded_template_edit_request->setOnBehalfOf('hankyWhites@cubeflakes.com');
try {
    $result = $apiInstance->getEmbeddedTemplateEditUrl($template_id, $embedded_template_edit_request);
    echo 'Embedded Template Edit URL: ' . $result->getEditUrl();
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->getEmbeddedTemplateEditUrl: ', $e->getMessage(), PHP_EOL;
}
