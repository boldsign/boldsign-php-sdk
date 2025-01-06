<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$template_id = 'Template ID';
// Create a role object
$role = new \BoldSign\Model\Role();
$role->setSignerRole("Blogger");
$role->setRoleIndex(1);
$role->setSignerName("name");
$role->setSignerEmail("email_example");

// Create the request body using the model
$embedded_send_template_form_request = new \BoldSign\Model\EmbeddedSendTemplateFormRequest();
$embedded_send_template_form_request->setTitle('Blue Template');
$embedded_send_template_form_request->setMessage('API document message description');
$embedded_send_template_form_request->setRoles([$role]);
$embedded_send_template_form_request->setShowToolbar(true);
$embedded_send_template_form_request->setShowSaveButton(true);
$embedded_send_template_form_request->setShowSendButton(true);
$embedded_send_template_form_request->setShowPreviewButton(true);
$embedded_send_template_form_request->setShowNavigationButtons(true);
$embedded_send_template_form_request->setShowTooltip(false);
try {    
    $result = $apiInstance->createEmbeddedRequestUrlTemplate($template_id, $embedded_send_template_form_request);
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->createEmbeddedRequestUrlTemplate: ', $e->getMessage(), PHP_EOL;
}
