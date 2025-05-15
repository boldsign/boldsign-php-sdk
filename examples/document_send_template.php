<?php require_once "vendor/autoload.php";

$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_Key');

$template_api = new BoldSign\Api\TemplateApi($config);
$form_fields = new BoldSign\Model\FormField();
$form_fields->setFieldType('Signature');
$form_fields->setPageNumber(1);
$bounds = new BoldSign\Model\Rectangle([100, 100, 100, 50]);
$form_fields->setBounds($bounds);

$role = new BoldSign\Model\Role();
$role->setSignerName('Richard');
$role->setSignerEmail('richard@cubeflakes.com');
$role->setSignerType("Signer");
$role->setFormFields([$form_fields]);

$send_for_sign_from_template = new BoldSign\Model\SendForSignFromTemplateForm();
$files = new \BoldSign\Model\FileInfo();
$files = 'tests/data/doc-1.pdf';
$send_for_sign_from_template->setFiles([$files]);
$send_for_sign_from_template->setRoles([$role]);

$send_using_template_response = $template_api->sendUsingTemplate($template_id = 'YOUR_TEMPLATE_ID', $send_for_sign_from_template);