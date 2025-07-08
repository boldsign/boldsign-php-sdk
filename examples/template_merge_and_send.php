<?php
require_once(__DIR__ . '/../vendor/autoload.php');
$config = new BoldSign\Configuration();
$config->setApiKey('API_KEY');
$template_api = new BoldSign\Api\TemplateApi($config);
$form_fields = new BoldSign\Model\FormField();
$form_fields->setFieldType('Signature');
$form_fields->setPageNumber(1);
$bounds = new BoldSign\Model\Rectangle([100, 100, 100, 50]);
$form_fields->setBounds($bounds);

$role = new BoldSign\Model\Role();
$role->setRoleIndex(2);
$role->setSignerName('richard');
$role->setSignerEmail('richard@gmail.com');
$role->setSignerRole('Manager1');
$role->setFormFields([$form_fields]);

$role1 = new BoldSign\Model\Role();
$role1->setRoleIndex(1);
$role1->setSignerName('david');
$role1->setSignerEmail('david@gmail.com');
$role1->setSignerRole('Manager2');
$role1->setFormFields([$form_fields]);

$merge_and_send_for_sign_form = new \BoldSign\Model\MergeAndSendForSignForm();
$merge_and_send_for_sign_form->setTemplateIds(['TEMPLATE_ID1', 'TEMPLATE_ID2']);
$merge_and_send_for_sign_form->setRoles([$role,$role1]);
$files = new \BoldSign\Model\FileInfo();
$files = "tests/data/doc-1.pdf";
$merge_and_send_for_sign_form->setFiles([$files]);
$template_api->mergeAndSend($merge_and_send_for_sign_form);