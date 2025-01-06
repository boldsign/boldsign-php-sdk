<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$send_for_sign = new BoldSign\Model\SendForSign();

// Set the file path
$pdfFilePath = 'tests\data\doc-1.pdf';
if (!file_exists($pdfFilePath)) {
    die("Error: PDF file does not exist at the specified path: $pdfFilePath");
}

// Create the DocumentInfo object
$documentInfo = new BoldSign\Model\DocumentInfo();
$documentInfo->setTitle('The Blueprint');
$documentInfo->setDescription('Please sign this document');

// Set the document info and file content
$send_for_sign->setDocumentInfo([$documentInfo]);
$send_for_sign->setFiles([$base64Pdf]);
$send_for_sign->setExpiryDateType('Days'); 
$send_for_sign->setExpiryValue(60); 
$send_for_sign->setDisableEmails(false);
$send_for_sign->setDisableSMS(false);

$bounds = new BoldSign\Model\Rectangle([100, 100, 100, 50]);

$signatureField = new BoldSign\Model\FormField();
$signatureField->setFieldType('Signature');
$signatureField->setPageNumber(1);
$signatureField->setBounds($bounds);

// Set the signers
$signer = new BoldSign\Model\DocumentSigner();
$signer->setName("Alex");
$signer->setHostEmail("alexgayle@cubeflakes.com");
$signer->setSignerType("Signer");
$signer->setFormFields([$signatureField]);
try {
    $result = $apiInstance->sendDocument($send_for_sign);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->sendDocument: ', $e->getMessage(), PHP_EOL;
}
