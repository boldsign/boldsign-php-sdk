<?php
require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\BrandCustomFieldDetails;
use BoldSign\Model\CustomFieldMessage;
use BoldSign\Model\CustomFieldCollection;
use BoldSign\Configuration;
use BoldSign\Api\BrandingApi;
use BoldSign\Api\CustomFieldApi;
use BoldSign\ApiException;
use BoldSign\Model\BrandCreated;
use BoldSign\Model\DeleteCustomFieldReply;
use BoldSign\Model\BrandingMessage;
use BoldSign\Model\CustomFormField;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestCustomFieldApi  extends TestCase
{
    public $customField_api;
    public $branding_api;
    public static ?string $brandId = null;
    public static ?string $customFieldId = null;
    public static ?string $fieldName = null;

    /** @var TestCustomFieldApi  */
    
    function randomNumbers() {
        $rangeStart = pow(10, 3 - 1);
        $rangeEnd = (pow(10, 3)) - 1;
        return (string) rand($rangeStart, $rangeEnd);
    }

    public function setUp(): void
    {     
        //Configure API key authorization: X-API-KEY
        $config = new Configuration();
        $config->setApiKey(API_KEY);
        $config->setHost(Host);
        $this->branding_api = new BrandingApi($config);
        $this->customField_api = new CustomFieldApi($config);
        $srting_value = $this->randomNumbers();
        self::$fieldName = "PHP SDK Custom field" . $srting_value;
    }

    public function testCreateBrand()
    {
        $brandName = "PHP SDK Brand";
        $brandLogo = "tests\data\sample.jpg";
        try {
            $create_brand_response = $this->branding_api->createBrand($brandName, $brandLogo);
            $brand_Id = $create_brand_response->getBrandId();
            $this->assertTrue($brand_Id != null);
            self::$brandId = $brand_Id;
            $this->assertInstanceOf(BrandCreated::class, $create_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateCustomFieldPositive()
    {
        //Form field
        $customFormField = new CustomFormField();
        $customFormField->setFieldType("Signature");
        $customFormField->setFont("Courier");
        $customFormField->setWidth(60);
        $customFormField->setHeight(60);

        //Brand Custom Field Details
        $brandCustomFieldDetails = new BrandCustomFieldDetails();
        $brandCustomFieldDetails->setFieldName(self::$fieldName);
        $brandCustomFieldDetails->setFieldDescription("Test custom field creation",);
        $brandCustomFieldDetails->setFieldOrder(1);
        $brandCustomFieldDetails->setBrandId(self::$brandId);
        $brandCustomFieldDetails->setFormField($customFormField);
        try {
            $create_custom_field_response = $this->customField_api->createCustomField($brandCustomFieldDetails);
            $customFieldId = $create_custom_field_response->getCustomFieldId();
            $customFieldMessage = $create_custom_field_response->getMessage();
            $this->assertTrue($customFieldId != null);
            $this->assertTrue($customFieldMessage != null);
            self::$customFieldId = $customFieldId;
            $this->assertInstanceOf(CustomFieldMessage::class, $create_custom_field_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateCustomFieldNegative()
    {
        //Form field
        $customFormField = new CustomFormField();
        $customFormField->setFieldType("Signature");
        $customFormField->setFont("Courier");
        $customFormField->setWidth(60);
        $customFormField->setHeight(60);

        //Brand Custom Field Details
        $brandCustomFieldDetails = new BrandCustomFieldDetails();
        $brandCustomFieldDetails->setFieldName(self::$fieldName);
        $brandCustomFieldDetails->setFieldDescription("Test custom field creation",);
        $brandCustomFieldDetails->setFieldOrder(1);
        $brandCustomFieldDetails->setBrandId("invalidBrandId");
        $brandCustomFieldDetails->setFormField($customFormField);
        try {
            $create_custom_field_response = $this->customField_api->createCustomField($brandCustomFieldDetails);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"BrandId\":[\"Provide a valid brand ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testEditCustomFieldPositive()
    {
        $customFieldId= self::$customFieldId;
        //Form field
        $customFormField = new CustomFormField();
        $customFormField->setFieldType("TextBox");
        $customFormField->setFont("Courier");
        $customFormField->setWidth(60);
        $customFormField->setHeight(60);

        //Brand Custom Field Details
        $brandCustomFieldDetails = new BrandCustomFieldDetails();
        $brandCustomFieldDetails->setFieldName(self::$fieldName);
        $brandCustomFieldDetails->setFieldDescription("Test custom field creation",);
        $brandCustomFieldDetails->setFieldOrder(1);
        $brandCustomFieldDetails->setBrandId(self::$brandId);
        $brandCustomFieldDetails->setFormField($customFormField);
        try {
            $edit_custom_field_response = $this->customField_api->editCustomField($customFieldId, $brandCustomFieldDetails);
            $customFieldId = $edit_custom_field_response->getCustomFieldId();
            $customFieldMessage = $edit_custom_field_response->getMessage();
            $this->assertTrue($customFieldId != null);
            $this->assertTrue($customFieldMessage != null);
            self::$customFieldId = $customFieldId;
            $this->assertInstanceOf(CustomFieldMessage::class, $edit_custom_field_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testEditCustomFieldNegative()
    {
        $customFieldId= "invalidCustomFieldId";
        //Form field
        $customFormField = new CustomFormField();
        $customFormField->setFieldType("TextBox");
        $customFormField->setFont("Courier");
        $customFormField->setWidth(60);
        $customFormField->setHeight(60);

        //Brand Custom Field Details
        $brandCustomFieldDetails = new BrandCustomFieldDetails();
        $brandCustomFieldDetails->setFieldName(self::$fieldName);
        $brandCustomFieldDetails->setFieldDescription("Test custom field creation",);
        $brandCustomFieldDetails->setFieldOrder(1);
        $brandCustomFieldDetails->setBrandId(self::$brandId);
        $brandCustomFieldDetails->setFormField($customFormField);
        try {
            $edit_custom_field_response = $this->customField_api->editCustomField($customFieldId, $brandCustomFieldDetails);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"customFieldId\":[\"Provide a valid custom field ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCustomFieldsListPositive()
    {
        $brandId= self::$brandId;
        try {
            $custom_field_list_response = $this->customField_api->customFieldsList($brandId);
            $this->assertTrue($custom_field_list_response != null);
            $this->assertInstanceOf(CustomFieldCollection::class, $custom_field_list_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCustomFieldsListNegative()
    {
        $brandId= "invalidBrandId";
        try {
            $custom_field_list_response = $this->customField_api->customFieldsList($brandId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"brandId\":[\"Provide a valid brand ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteCustomFieldPositive()
    {
        $customFieldId= self::$customFieldId;
        try {
            $delete_custom_field_response = $this->customField_api->deleteCustomField($customFieldId);
            $this->assertTrue($delete_custom_field_response != null);
            $this->assertInstanceOf(DeleteCustomFieldReply::class, $delete_custom_field_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testdeleteCustomFieldNegative()
    {
        $customFieldId= "invalidCustomFieldId";
        try {
            $delete_custom_field_response = $this->customField_api->deleteCustomField($customFieldId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"customFieldId\":[\"Provide a valid custom field ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteBrandPositive()
    {
        $brandId = self::$brandId; 
        try {
            $delete_brand_response = $this->branding_api->deleteBrand($brandId);
            $this->assertTrue($delete_brand_response != null);
            $this->assertInstanceOf(BrandingMessage::class, $delete_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
