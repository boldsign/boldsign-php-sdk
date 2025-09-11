<?php
require_once(__DIR__ . '/../vendor/autoload.php');

$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);
$document_id = "YOUR_DOCUMENT_ID";

$form_fields = new \BoldSign\Model\EditFormField();
$form_fields->setEditAction("Add");
$form_fields->setFieldType("Signature");
$form_fields->setPageNumber(1);
$form_fields->setBounds(new \BoldSign\Model\Rectangle( [50, 50, 200, 25]));

$signers = new BoldSign\Model\EditDocumentSigner();
$signers->setEditAction("Add");
$signers->setEmailAddress("siva@example.com");
$signers->setName("Signer_Name");
$signers->setFormFields([$form_fields]);

$document1 = new BoldSign\Model\EditDocumentFile();
$document1->setFileUrl("https://fir-demo-html.web.app/BasicTags1.pdf");
$document1->setEditAction('Add');

$edit_document_request = new \BoldSign\Model\EditDocumentRequest();
$edit_document_request->setMessage('Updated docuemnt');
$edit_document_request->setSigners([$signers]);
$edit_document_request->setFiles([$document1]);
try {
    $edit_document_response = $apiInstance->editDocument($document_id, $edit_document_request);
    echo 'Document updated successfully.',$edit_document_response;
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->EditDocument: ', $e->getMessage(), PHP_EOL;
}


