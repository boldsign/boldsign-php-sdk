<?php
require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\ViewBrandDetails;
use BoldSign\Model\BrandingRecords;
use BoldSign\Configuration;
use BoldSign\Api\BrandingApi;
use BoldSign\ApiException;
use BoldSign\Model\BrandCreated;
use BoldSign\Model\BrandingMessage;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestBrandingApi  extends TestCase
{
    public $branding_api;
    public static ?string $brandId = null;

    /** @var TestBrandingApi  */

    public function setUp(): void
    {     
        //Configure API key authorization: X-API-KEY
        $config = new Configuration();
        $config->setApiKey(API_KEY);
        $config->setHost(Host);
        $this->branding_api = new BrandingApi($config);
    }

    public function testCreateBrandPositive()
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

    public function testEditBrandPositive()
    {
        $brandId =  self::$brandId;
        $brandName = "Update Brand Name";   
        try {
            $edit_brand_response = $this->branding_api->editBrand($brandId, $brandName);
            $brand_Id = $edit_brand_response->getBrandId();
            $this->assertTrue($brand_Id != null);
            self::$brandId = $brand_Id;
            $this->assertInstanceOf(BrandCreated::class, $edit_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testEditBrandNegative()
    {
        $brandId =  "invaildBrandId";
        $brandName = "Update Brand Name";   
        try {
            $edit_brand_response = $this->branding_api->editBrand($brandId, $brandName);
        }catch (ApiException $e) {
            print_r($e->getMessage());
           $this->assertTrue($e->getCode() === 400);
           $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"brandId\":[\"Provide a valid brand ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetBrandPositive()
    {
        $brandId = self::$brandId; 
        try {
            $get_brand_response = $this->branding_api->getBrand($brandId);
            $this->assertTrue($get_brand_response != null);
            $this->assertInstanceOf(ViewBrandDetails::class, $get_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testGetBrandNegative()
    {
        $brandId = "invaildBrandId";
        try {
            $get_brand_response = $this->branding_api->getBrand($brandId);
        }catch (ApiException $e) {
           $this->assertTrue($e->getCode() === 400);
           $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"brandId\":[\"Provide a valid brand ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testListBrandPositive()
    {
        try {
            $list_brand_response = $this->branding_api->brandList();
            $this->assertTrue($list_brand_response != null);
            $this->assertInstanceOf(BrandingRecords::class, $list_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testResetDefaultPositive()
    {
        $brandId = self::$brandId; 
        try {
            $reset_default_brand_response = $this->branding_api->resetDefaultBrand($brandId);
            $this->assertTrue($reset_default_brand_response != null);
            $this->assertInstanceOf(BrandingMessage::class, $reset_default_brand_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testResetDefaultNegative()
    {
        $brandId = "invaildBrandId"; 
        try {
            $reset_default_brand_response = $this->branding_api->resetDefaultBrand($brandId);
        }catch (ApiException $e) {
           $this->assertTrue($e->getCode() === 400);
           $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"brandId\":[\"Provide a valid brand ID\"]},") !== false);
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
    
    public function testDeleteBrandNegative()
    {
        $brandId = "invaildBrandId"; 
        try {
            $delete_brand_response = $this->branding_api->deleteBrand($brandId);
        }catch (ApiException $e) {
           $this->assertTrue($e->getCode() === 400);
           $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"brandId\":[\"Provide a valid brand ID\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
