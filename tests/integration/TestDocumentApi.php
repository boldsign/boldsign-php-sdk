<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\SendForSign;
use BoldSign\Model\FormField;
use BoldSign\Model\DocumentCreated;
use BoldSign\Configuration;
use BoldSign\Api\DocumentApi;
use BoldSign\ApiException;
use BoldSign\Model\CreateContactResponse;
use BoldSign\Model\DocumentSigner;
use BoldSign\Model\ExtendExpiry;
use BoldSign\Model\AccessCodeDetails;
use BoldSign\Model\AccessCodeDetail;
use BoldSign\Model\ChangeRecipient;
use BoldSign\Model\DocumentTags;
use BoldSign\Model\RemoveAuthentication;
use BoldSign\Model\RevokeDocument;
use BoldSign\Model\FormGroup;
use BoldSign\Model\ImageInfo;
use BoldSign\Model\PrefillField;
use BoldSign\Model\PrefillFieldRequest;
use BoldSign\Model\DocumentCC;
use BoldSign\Model\PhoneNumber;
use BoldSign\Model\Rectangle;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestDocumentApi  extends TestCase
{
    public $document_api;
    public static ?string $createdDocumentId = null;
    public static ?string $createdDocumentIdTextboxField = null;

    /** @var TestDocumentApi  */

    public function setUp(): void
    {     
        //Configure API key authorization: X-API-KEY
        $config = new Configuration();
        $config->setApiKey(API_KEY);
        $config->setHost(Host);
        $this->document_api = new DocumentApi($config);
    }

    public function testSendDocumentPositive()
    {
        //First Formfields
        $firstFormFields = new FormField();
        $firstFormFields->setId("SignatureField1");
        $firstFormFields->setFieldType("Signature");
        $firstFormFields->setPageNumber(1);
        $firstBounds = new Rectangle([100, 100, 100, 50]);
        $firstFormFields->setBounds($firstBounds);

        //Second Formfields
        $secondFormFields = new FormField();
        $secondFormFields->setId("SignatureField1");
        $secondFormFields->setFieldType("Signature");
        $secondFormFields->setPageNumber(1);
        $secondBounds = new Rectangle([200, 150, 100, 50]);
        $secondFormFields->setBounds($secondBounds);

        //Formfields
        $thirdFormFields = new FormField();
        $thirdFormFields->setId("SignatureField1");
        $thirdFormFields->setFieldType("Signature");
        $thirdFormFields->setPageNumber(1);
        $thirdBounds = new Rectangle([300, 200, 100, 50]);
        $thirdFormFields->setBounds($thirdBounds);

        //Document signers
        $firstDocumentSigner = new DocumentSigner();
        $firstDocumentSigner->setName("Test Signer 1");
        $firstDocumentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $firstDocumentSigner->setSignerType("Signer");
        $firstDocumentSigner->setAuthenticationType("AccessCode");
        $firstDocumentSigner->setAuthenticationCode("123456");
        $firstDocumentSigner->setFormFields([$firstFormFields]);
        
        //Document signers
        $secondDocumentSigner = new DocumentSigner();
        $secondDocumentSigner->setName("Test Signer 2");
        $secondDocumentSigner->setEmailAddress("girisankar.syncfusion+2@gmail.com");
        $secondDocumentSigner->setSignerType("Reviewer");
        $secondDocumentSigner->setAuthenticationType("SMSOTP");
        $phone_number = new PhoneNumber();
        $phone_number->setNumber("1234567890");
        $phone_number->setCountryCode("+91");
        $secondDocumentSigner->setPhoneNumber($phone_number);
        $secondDocumentSigner->setFormFields([$secondFormFields]);
        
        //Document signers
        $thirdDocumentSigner = new DocumentSigner();
        $thirdDocumentSigner->setName("Test Signer 3");
        $thirdDocumentSigner->setEmailAddress("girisankar.syncfusion+3@gmail.com");
        $thirdDocumentSigner->setSignerType("Signer");
        $thirdDocumentSigner->setAuthenticationType("EmailOTP");
        $thirdDocumentSigner->setFormFields([$thirdFormFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$firstDocumentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
            self::$createdDocumentId=$documentId;
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendDocumentNegative()
    {
        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"Signers\":[\"Minimum one signer is needed to create a document\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testExtendExpiryPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;

        #Calculate new expiry date (3 months from now)
        $date = new DateTime('now', new DateTimeZone('UTC'));
        $date->add(new DateInterval('P90D')); 
        // Adds 90 days
        $newExpiryDate = $date->format('Y-m-d');

        //Extend expiry
        $extendExpiry = new ExtendExpiry();
        $extendExpiry->setNewExpiryValue($newExpiryDate);
        try {
            $this->document_api->extendExpiry($documentId, $extendExpiry);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testExtendExpiryNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";

        #Calculate new expiry date (3 months from now)
        $date = new DateTime('now', new DateTimeZone('UTC'));
        $date->add(new DateInterval('P90D')); 
        // Adds 90 days
        $newExpiryDate = $date->format('Y-m-d');

        //Extend expiry
        $extendExpiry = new ExtendExpiry();
        $extendExpiry->setNewExpiryValue($newExpiryDate);
        try {
            $this->document_api->extendExpiry($documentId, $extendExpiry);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 404);
            $this->assertTrue(strpos($e->getMessage(), "{\"error\":\"Invalid Document ID\"}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDocumentListPositive()
    {
        $page = 1;
        $pageSize = 10;
        try {
            $list_documents_response = $this->document_api->listDocuments($page, null, null, null,null, $pageSize);
            $this->assertTrue($list_documents_response !=null);
            $this->assertTrue(count($list_documents_response->getResult()) > 0);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDocumentListNegative()
    {
        $page = 300;
        $pageSize = 250;
        try {
            $list_documents_response = $this->document_api->listDocuments($page, null, null, null,null, $pageSize);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTeamDocumentsPositive()
    {
        $page = 1;
        $pageSize = 10;
        try {
            $list_documents_response = $this->document_api->teamDocuments($page, null, null, null,null, $pageSize);
            $this->assertTrue($list_documents_response !=null);
            $this->assertTrue(count($list_documents_response->getResult()) > 0);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTeamDocumentsNegative()
    {
        $page = 300;
        $pageSize = 250;
        try {
            $list_documents_response = $this->document_api->teamDocuments($page, null, null, null,null, $pageSize);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testBehalfDocumentsPositive()
    {
        $page=1;
        $page_size= 10;
        try {
            $behalf_documents_response = $this->document_api->behalfDocuments($page, null, null, null, $page_size); 
            $this->assertTrue($behalf_documents_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testBehalfDocumentsNegative()
    {
        $page=300;
        $page_size= 250;
        try {
            $behalf_documents_response = $this->document_api->behalfDocuments($page, null, null, null, $page_size); 
            $this->assertTrue($behalf_documents_response != null);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDocumentsPropertiesPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        try {
            $get_properties_response = $this->document_api->getProperties($documentId); 
            $this->assertTrue($get_properties_response != null);
            $this->assertTrue($get_properties_response->getDocumentId()!= null);
            $this->assertTrue($get_properties_response->getSignerDetails()!= null);
            $this->assertTrue($get_properties_response->getMessageTitle()!= null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDocumentsPropertiesNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        try {
            $get_properties_response = $this->document_api->getProperties($documentId); 
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"documentId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDownloadDocumentsPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        try {
            $download_document_response = $this->document_api->downloadDocument($documentId); 
            $this->assertTrue($download_document_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDownloadDocumentsNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        try {
            $download_document_response = $this->document_api->downloadDocument($documentId);
            $this->assertTrue($download_document_response != null);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"documentId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testChangeAccessCodePositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        //Email Id
        $emailId = "girisankar.syncfusion+1@gmail.com";

        //Access code details
        $accessCodeDetails = new AccessCodeDetails();
        $accessCodeDetails->setAccessCode('123456');
        try {
            $this->document_api->changeAccessCode($documentId, $accessCodeDetails, $emailId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testChangeAccessCodeNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        //Email Id
        $emailId = "girisankar.syncfusion+1@gmail.com";

        //Access code details
        $accessCodeDetails = new AccessCodeDetails();
        $accessCodeDetails->setAccessCode('123456');
        try {
            $this->document_api->changeAccessCode($documentId, $accessCodeDetails, $emailId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"DocumentId\":[\"The field DocumentId is invalid.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testAddTagsPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;

        //Document Tags
        $documentTags = new DocumentTags();
        $documentTags->setDocumentId($documentId);
        $documentTags->setTags(['Test', 'Api']);
        try {
            $this->document_api->addTag($documentTags);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testAddTagsNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";

        //Document Tags
        $documentTags = new DocumentTags();
        $documentTags->setDocumentId($documentId);
        $documentTags->setTags(['Test', 'Api']);

        try {
            $this->document_api->addTag($documentTags);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"DocumentId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteTagsPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;

        //Document Tags
        $documentTags = new DocumentTags();
        $documentTags->setDocumentId($documentId);
        $documentTags->setTags(['Test', 'Api']);
        try {
            $this->document_api->deleteTag($documentTags);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteTagsNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";

        //Access code details
        $documentTags = new DocumentTags();
        $documentTags->setDocumentId($documentId);
        $documentTags->setTags(['Test', 'Api']);
        try {
            $this->document_api->deleteTag($documentTags);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"DocumentId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testRemoveAuthenticationPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        $emailId = 'girisankar.syncfusion+1@gmail.com';

        //Remove Authentication
        $removeAuthentication = new RemoveAuthentication();
        $removeAuthentication->setEmailId($emailId);
        try {
            $this->document_api->removeAuthentication($documentId, $removeAuthentication);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testRemoveAuthenticationNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        $emailId = 'girisankar.syncfusion+1@gmail.com';

        //Remove Authentication
        $removeAuthentication = new RemoveAuthentication();
        $removeAuthentication->setEmailId($emailId);
        try {
            $this->document_api->removeAuthentication($documentId, $removeAuthentication);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"DocumentId\":[\"The field DocumentId is invalid.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testAddAuthenticationPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        $emailId = 'girisankar.syncfusion+1@gmail.com';

        //Remove Authentication
        $accessCodeDetail = new AccessCodeDetail();
        $accessCodeDetail->setEmailId($emailId);
        $accessCodeDetail->setAuthenticationType("AccessCode");
        $accessCodeDetail->setAccessCode("54321");
        try {
            $this->document_api->addAuthentication($documentId, $accessCodeDetail);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testAddAuthenticationNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        $emailId = 'girisankar.syncfusion+1@gmail.com';

        //Remove Authentication
        $accessCodeDetail = new AccessCodeDetail();
        $accessCodeDetail->setAuthenticationType("AccessCode");
        $accessCodeDetail->setEmailId($emailId);
        $accessCodeDetail->setAccessCode("54321");
        try {
            $this->document_api->addAuthentication($documentId, $accessCodeDetail);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"documentId\":[\"The field documentId is invalid.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testChangeRecipientPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;

        //ChangeRecipient
        $changeRecipient = new ChangeRecipient();
        $changeRecipient->setNewSignerName('New Signer');
        $changeRecipient->setReason('Change Ricpient');
        $changeRecipient->setNewSignerEmail('girisankar.syncfusion+newSsgner@gmail.com');
        $changeRecipient->setOldSignerEmail('girisankar.syncfusion+1@gmail.com');
        try {
            $change_recipient_response = $this->document_api->changeRecipient($documentId, $changeRecipient);
            $this->assertTrue($change_recipient_response == null);
        }catch (ApiException $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        }
    }

    public function testChangeRecipientNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";

        //Change Recipient
        $changeRecipient = new ChangeRecipient();
        $changeRecipient->setNewSignerName('New Signer');
        $changeRecipient->setReason('Change Ricpient');
        $changeRecipient->setNewSignerEmail('girisankar.syncfusion+newsigner@gmail.com');
        $changeRecipient->setOldSignerEmail('girisankar.syncfusion+1@gmail.com');
        try {
            $change_recipient_response = $this->document_api->changeRecipient($documentId, $changeRecipient);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"documentId\":[\"The field documentId is invalid.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testRevokeDocumentPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;

        //Remove Authentication
        $revokeDocument = new RevokeDocument();
        $revokeDocument->setMessage("Document Revoked");
        try {
            $this->document_api->revokeDocument($documentId, $revokeDocument);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testRevokeDocumentNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";

        //Remove Authentication
        $revokeDocument = new RevokeDocument();
        $revokeDocument->setMessage("Document Revoked");
        try {
            $this->document_api->revokeDocument($documentId, $revokeDocument);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"documentId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteDocumentPositive()
    {
        //Document Id
        $documentId = self::$createdDocumentId;
        try {
            $this->document_api->deleteDocument($documentId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteDocumentNegative()
    {
        //Document Id
        $documentId = "InvalidDocumentId";
        try {
            $this->document_api->deleteDocument($documentId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendDocumentwithImageField()
    {
        //First Formfields
        $imageInfo = new ImageInfo();
        $imageInfo->setTitle("Image Test");
        $imageInfo->setAllowedFileExtensions(".png");
        $imageInfo->setDescription("Image for testing");

        //First Formfields
        $formFields = new FormField();
        $formFields->setId("image_Test");
        $formFields->setFieldType("Image");
        $formFields->setPageNumber(1);
        $formFields->setImageInfo($imageInfo);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendDocumentwithFileUrl()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("Signature");
        $formFields->setFieldType("Signature");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFileUrls(["https://fir-demo-html.web.app/BasicTags1.pdf", "https://fir-demo-html.web.app/test-document1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendDocumentwithCheckBoxFieldAndReadOnly()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("CheckBox");
        $formFields->setFieldType("CheckBox");
        $formFields->setIsReadOnly(true);
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendDocumentwithAddGroupCheckBoxField()
    {
        //Formfields
        $firstFormFields = new FormField();
        $firstFormFields->setId("CheckBox1");
        $firstFormFields->setFieldType("CheckBox");
        // $firstFormFields->setGroupName("CheckBox_Group1");
        $firstFormFields->setPageNumber(1);
        $firstBounds = new Rectangle([100, 100, 100, 50]);
        $firstFormFields->setBounds($firstBounds);

        //Formfields
        $secondFormFields = new FormField();
        $secondFormFields->setId("CheckBox2");
        $secondFormFields->setFieldType("CheckBox");
        // $secondFormFields->setGroupName("CheckBox_Group2");
        $secondFormFields->setPageNumber(1);
        $secondBounds = new Rectangle([200, 100, 100, 50]);
        $secondFormFields->setBounds($secondBounds);

        //Formfields
        $thirdFormFields = new FormField();
        $thirdFormFields->setId("CheckBox3");
        $thirdFormFields->setFieldType("CheckBox");
        // $thirdFormFields->setGroupName("CheckBox_Group3");
        $thirdFormFields->setPageNumber(1);
        $thirdBounds = new Rectangle([300, 100, 100, 50]);
        $thirdFormFields->setBounds($thirdBounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$firstFormFields, $secondFormFields, $thirdFormFields]);

        // $fromGroup = new FormGroup();
        // $fromGroup->setGroupNames(["CheckBox_Group1", "CheckBox_Group2", "CheckBox_Group3"]);
        // $fromGroup->setMaximumCount(3);
        // $fromGroup->setMinimumCount(1);
        // $fromGroup->setGroupValidation("Absolute");

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        //$sendForSign->setFormGroups($fromGroup);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testReplaceFillableFields()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("Signature");
        $formFields->setFieldType("Signature");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        $sendForSign->setAutoDetectFields(true);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testSendDocumentTextField()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("textValue");
        $formFields->setFieldType("TextBox");
        $formFields->setValidationType("NumbersOnly");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
            self::$createdDocumentIdTextboxField = $documentId; // Store the created document ID for future reference
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testPreFillingReadonlyFields()
    {
        //Document Id
        $documentId= self::$createdDocumentIdTextboxField;

        //Prefill Field
        $prefillField = new PrefillField();
        $prefillField->setId("textValue");
        $prefillField->setValue("123456789");

        //Prefill Field Request
        $prefillFieldRequest = new PrefillFieldRequest();
        $prefillFieldRequest->setFields([$prefillField]);
        try {
            $this->document_api->prefillFields($documentId, $prefillFieldRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testSendDocumentWithDisableEmails()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("textValue");
        $formFields->setFieldType("TextBox");
        $formFields->setValidationType("NumbersOnly");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setDisableEmails(true);
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testSendDocumentWithMultipleCC()
    {
        //Formfields
        $formFields = new FormField();
        $formFields->setId("textValue");
        $formFields->setFieldType("TextBox");
        $formFields->setValidationType("NumbersOnly");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);

        //Document signers
        $documentSigner = new DocumentSigner();
        $documentSigner->setName("Test Signer 1");
        $documentSigner->setEmailAddress("girisankar.syncfusion+1@gmail.com");
        $documentSigner->setSignerType("Signer");
        $documentSigner->setAuthenticationType("AccessCode");
        $documentSigner->setAuthenticationCode("123456");
        $documentSigner->setFormFields([$formFields]);

        //Document CC
        $firstDocumentCC = new DocumentCC();
        $firstDocumentCC->setEmailAddress("DianaDavid@gmail.com");
        $secondDocumentCC = new DocumentCC();
        $secondDocumentCC->setEmailAddress("testsdk123@gmail.com");
        $thirdDocumentCC = new DocumentCC();
        $thirdDocumentCC->setEmailAddress("ClaraThomas@gmail.com");

        //Send for sign 
        $sendForSign = new SendForSign();
        $sendForSign->setFiles(["tests\data\doc-1.pdf"]);
        $sendForSign->setTitle("Document PHP SDK");
        $sendForSign->setDisableEmails(true);
        $sendForSign->setCc([$firstDocumentCC, $secondDocumentCC, $thirdDocumentCC]);
        $sendForSign->setSigners([$documentSigner]);
        try {
            $send_document_response = $this->document_api->sendDocument($sendForSign);
            $documentId = $send_document_response->getDocumentId();
            $this->assertTrue($documentId != null);
            $this->assertInstanceOf(DocumentCreated::class, $send_document_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
