<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);


$template_id = 'YOUR_TEMPLATE_ID';
$formField = new BoldSign\Model\FormFieldPermission();
$formField->setCanAdd(true);
$formField->setCanModify(false);
$formField->setCanModifyDefaultValue(false);

$edit_template_request = new \BoldSign\Model\EditTemplateRequest();
$edit_template_request->setTitle('Updated Template Title');
$edit_template_request->setDescription('Updated description for the template.');
$edit_template_request->setEnableReassign(true);
$edit_template_request->setDocumentMessage('Updated document message for signers.');
$edit_template_request->setFormFieldPermission($formField);
try {
    $apiInstance->editTemplate($template_id, $edit_template_request);
    echo 'Template updated successfully.';
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->editTemplate: ', $e->getMessage(), PHP_EOL;
}
