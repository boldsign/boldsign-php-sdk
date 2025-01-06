<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\CreateTemplateRequest;
use BoldSign\Model\TemplateCreated;
use BoldSign\Model\TemplateTag;
use BoldSign\Configuration;
use BoldSign\Api\TemplateApi;
use BoldSign\ApiException;
use BoldSign\Model\CreateContactResponse;
use BoldSign\Model\SendForSignFromTemplateForm;
use BoldSign\Model\DocumentCreated;
use BoldSign\Model\DocumentInfo;
use BoldSign\Model\TemplateRole;
use BoldSign\Model\FormField;
use BoldSign\Model\Rectangle;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestTemplateApi  extends TestCase
{
    public $template_api;
    public static ?string $createdTemplateId  = null;
    public static ?string $createdTemplateIdFromField  = null;
    public static ?string $createdTemplateIdImageField = null;

    /** @var TestTemplateApi  */

    public function setUp(): void
    {     
        //Configure API key authorization: X-API-KEY
        $config = new Configuration();
        $config->setApiKey(API_KEY);
        $config->setHost(Host);
        $this->template_api = new TemplateApi($config);
    }

    public function testTemplateListPositive()
    {        
       # Define parameters for listing templates
        $page = 1;
        $template_type = null;  # Example: 'mytemplates', 'sharedtemplates', 'alltemplates'
        $page_size = 10;
        try {
            $list_templates_response = $this->template_api->listTemplates($page, $template_type, $page_size);
            $this->assertTrue($list_templates_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplateListNegative()
    {          
        # Define parameters for listing templates
         $page = 300;
         $template_type = null;  # Example: 'mytemplates', 'sharedtemplates', 'alltemplates'
         $page_size = 250;
         try {
            $list_templates_response = $this->template_api->listTemplates($page, $template_type, $page_size);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateTemplatePositive()
    {   
        //Formfields
        $formFields = new FormField();
        $formFields->setId("SignatureField1");
        $formFields->setFieldType("Signature");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);
        
        //Roles
        $templateRole = new TemplateRole();
        $templateRole->setIndex(1);
        $templateRole->setName("Signer");
        $templateRole->setDefaultSignerName("Signer1");
        $templateRole->setDefaultSignerEmail("Signer1@gmail.com");
        $templateRole->setSignerType("Signer");
        $templateRole->setDeliveryMode("Email");
        $templateRole->setSignerOrder(1);
        $templateRole->setFormFields([$formFields]);
        
        //Create Template Request
        $createTemplateRequest = new CreateTemplateRequest();
        $createTemplateRequest->setTitle("PHP Template Test");
        $createTemplateRequest->setDocumentTitle("PHP Template Test case");
        $createTemplateRequest->setDocumentMessage("PHP Template Test case");
        $createTemplateRequest->setDescription("This is a new template description");
        $createTemplateRequest->setFiles(["tests\documents\input\doc_1.pdf"]);
        $createTemplateRequest->setRoles([$templateRole]);

        try {
            $create_template_response = $this->template_api->createTemplate($createTemplateRequest);
            $this->assertTrue($create_template_response != null);
            $templateId = $create_template_response->getTemplateId();
            $this->assertTrue($templateId != null);
            $this->assertInstanceOf(TemplateCreated::class, $create_template_response);
            self::$createdTemplateId = $templateId;
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateTemplateNegative()
    {          
        //Formfields
        $formFields = new FormField();
        $formFields->setId("SignatureField1");
        $formFields->setFieldType("Signature");
        $formFields->setPageNumber(1);
        $bounds = new Rectangle([100, 100, 100, 50]);
        $formFields->setBounds($bounds);
        
        //Roles
        $templateRole = new TemplateRole();
        $templateRole->setIndex(1);
        $templateRole->setName("Signer");
        $templateRole->setDefaultSignerName("Signer1");
        $templateRole->setDefaultSignerEmail("Signer1@gmail.com");
        $templateRole->setSignerType("Signer");
        $templateRole->setDeliveryMode("Email");
        $templateRole->setSignerOrder(1);
        $templateRole->setFormFields([$formFields]);
        
        //Create Template Request
        $createTemplateRequest = new CreateTemplateRequest();
        $createTemplateRequest->setDocumentTitle("PHP Template Test case");
        $createTemplateRequest->setDocumentMessage("PHP Template Test case");
        $createTemplateRequest->setDescription("This is a new template description");
        $createTemplateRequest->setFiles(["tests\documents\input\doc_1.pdf"]);
        $createTemplateRequest->setRoles([$templateRole]);

        try {
            $create_template_response = $this->template_api->createTemplate($createTemplateRequest);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"Title\":[\"The Title field is required.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDownloadTemplatePositive()
    {    
        $templateId =  self::$createdTemplateId;
        try {
            $download_templates_response = $this->template_api->download($templateId);
            $this->assertTrue($download_templates_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDownloadTemplateNegative()
    {          
        $templateId =  "invalidTemplateId";
        try {
            $download_templates_response = $this->template_api->download($templateId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"templateId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplatePropertiesPositive()
    {    
        $templateId =  self::$createdTemplateId;
        try {
            $get_properties_response= $this->template_api->getProperties($templateId);
            $this->assertTrue($get_properties_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplatePropertiesNegative()
    {          
        $templateId =  "invalidTemplateId";
        try {
            $get_properties_response= $this->template_api->getProperties($templateId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"templateId\":[\"Invalid template ID.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendUsingTemplatePositive()
    {    
        $templateId =  self::$createdTemplateId;
        $sendForSignFromTemplateForm = new SendForSignFromTemplateForm();
        try {
            $send_using_template_response= $this->template_api->sendUsingTemplate($templateId, $sendForSignFromTemplateForm);
            $this->assertTrue($send_using_template_response != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testSendUsingTemplateNegative()
    {          
        $templateId =  "invalidTemplateId";
        $sendForSignFromTemplateForm = new SendForSignFromTemplateForm();
        try {
            $send_using_template_response= $this->template_api->sendUsingTemplate($templateId, $sendForSignFromTemplateForm);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"templateId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplateAddTagsPositive()
    {    
        $templateId =  self::$createdTemplateId;

        //Template Tags
        $templateTags = new TemplateTag();
        $templateTags->setTemplateId($templateId);
        $templateTags->setDocumentLabels(['DocumentTest', 'DocumentApi']);
        $templateTags->setTemplateLabels(['TemplateTest', 'TemplateApi']);
        try {
            $add_tags_response= $this->template_api->addTag($templateTags);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplateAddTagsNegative()
    {          
        $templateId =  "invalidTemplateId";

        //Template Tags
        $templateTags = new TemplateTag();
        $templateTags->setTemplateId($templateId);
        $templateTags->setDocumentLabels(['DocumentTest', 'DocumentApi']);
        $templateTags->setTemplateLabels(['TemplateTest', 'TemplateApi']);
        try {
            $add_tags_response= $this->template_api->addTag($templateTags);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"error\":\"Template Id does not exist or does not belong to this organization\"}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplateDeleteTagsPositive()
    {    
        $templateId =  self::$createdTemplateId;

        //Template Tags
        $templateTags = new TemplateTag();
        $templateTags->setTemplateId($templateId);
        $templateTags->setDocumentLabels(['DocumentTest', 'DocumentApi']);
        $templateTags->setTemplateLabels(['TemplateTest', 'TemplateApi']);
        try {
            $delete_tags_response= $this->template_api->deleteTag($templateTags);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTemplateDeleteTagsNegative()
    {          
        $templateId =  "invalidTemplateId";

        //Template Tags
        $templateTags = new TemplateTag();
        $templateTags->setTemplateId($templateId);
        $templateTags->setDocumentLabels(['DocumentTest', 'DocumentApi']);
        $templateTags->setTemplateLabels(['TemplateTest', 'TemplateApi']);
        try {
            $delete_tags_response= $this->template_api->deleteTag($templateTags);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"error\":\"Template Id does not exist or does not belong to this organization\"}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteTemplatePositive()
    {    
        $templateId =  self::$createdTemplateId;
        try {
            $delete_tags_response= $this->template_api->deleteTemplate($templateId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteTemplateNegative()
    {          
        $templateId =  "invalidTemplateId";
        try {
            $delete_tags_response= $this->template_api->deleteTemplate($templateId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"templateId\":[\"Provide valid document id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
