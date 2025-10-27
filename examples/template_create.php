<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\TemplateApi($config);

$bounds = new BoldSign\Model\Rectangle([200, 200, 150, 150]);
$signatureField = new BoldSign\Model\FormField();
$signatureField->setFieldType('Signature');
$signatureField->setPageNumber(1);
$signatureField->setBounds($bounds);

$payload = new BoldSign\Model\CreateTemplateRequest();
$payload->setTitle('Name');
$payload->setBrandId('YOUR_BRAND_ID');
$payload->setDescription('This is a description for the new template');
$payload->setDocumentTitle('Document Title');
$payload->setDocumentMessage('Message to signers');
$payload->setEnableReassign(true);
$payload->setAllowNewRoles(true);

$pdfFilePath = 'tests\data\doc-1.pdf'; 
if (!file_exists($pdfFilePath)) {
    die("Error: PDF file does not exist at the specified path: $pdfFilePath");
}
$formField = new BoldSign\Model\FormFieldPermission();
$formField->setCanAdd(false);
$formField->setCanModify(true);
$formField->setCanModifyDefaultValue(false);
$payload->setFiles([$pdfFilePath]);
$role = new BoldSign\Model\TemplateRole();
$role->setName('Signer');
$role->setIndex(1);
$role->setFormFields([$signatureField]);
$payload->setRoles([$role]);
$payload->setFormFieldPermission($formField);
try {
    $result = $apiInstance->createTemplate($payload);
    echo 'Template create with the template ID: ',$result;
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->createTemplate: ', $e->getMessage(), PHP_EOL;
}
