<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Configuration;
use BoldSign\Api\SenderIdentitiesApi;
use BoldSign\Model\CreateSenderIdentityRequest;
use BoldSign\Model\EditSenderIdentityRequest;
use BoldSign\Model\SenderIdentityList;
use BoldSign\ApiException;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestSenderIdentitiesApi  extends TestCase
{
    public $senderidentities_api;
    public static ?string $emailID = null;
    public static ?string $email = null;

    /** @var TestSenderIdentitiesApi  */
    
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
        $this->senderidentities_api = new SenderIdentitiesApi($config);
        $srting_value = $this->randomNumbers();
        self::$emailID = "prakash.viswanathan+sdk+" . $srting_value . "@syncfusion.com";
    }

    public function testCreateSenderIdentitiesPositive()
    {  
        self::$email= self::$emailID;
        $createSenderIdentityRequest = new CreateSenderIdentityRequest();
        $createSenderIdentityRequest->setEmail(self::$email);
        $createSenderIdentityRequest->setName("SenderIdentity SDK");
        try {
            $this->senderidentities_api->createSenderIdentities($createSenderIdentityRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateSenderIdentitiesNegative()
    {  
        $createSenderIdentityRequest = new CreateSenderIdentityRequest();
        $createSenderIdentityRequest->setEmail("InvalidEmail");
        $createSenderIdentityRequest->setName("SenderIdentity SDK");
        try {
            $this->senderidentities_api->createSenderIdentities($createSenderIdentityRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"Email\":[\"The field Email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateSenderIdentitiesPositive()
    {  
        $emailID = self::$email;
        $editSenderIdentityRequest = new EditSenderIdentityRequest();
        $editSenderIdentityRequest->setName("Update SenderIdentity SDK");
        try {
            $this->senderidentities_api->updateSenderIdentities($emailID, $editSenderIdentityRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateSenderIdentitiesNegative()
    {  
        $emailID = "InvalidEmail";
        $editSenderIdentityRequest = new EditSenderIdentityRequest();
        $editSenderIdentityRequest->setName("Update SenderIdentity SDK");
        try {
            $this->senderidentities_api->updateSenderIdentities($emailID, $editSenderIdentityRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"email\":[\"The field email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testListSenderIdentitiesPositive()
    {  
        $page=1;
        $pageSize=10;
        try {
            $list_senderIdentities_response = $this->senderidentities_api->listSenderIdentities($page, $pageSize);
            $this->assertTrue($list_senderIdentities_response != null);
            $this->assertTrue($list_senderIdentities_response->getResult() != null);
            $this->assertInstanceOf(SenderIdentityList::class, $list_senderIdentities_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testListSenderIdentitiesNegative()
    {  
        $page=300;
        $pageSize=250;
        try {
            $list_senderIdentities_response = $this->senderidentities_api->listSenderIdentities($page, $pageSize);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testResendInvitationSenderIdentitiesPositive()
    {  
        $emailID = self::$email;
        try {
            $this->senderidentities_api->resendInvitationSenderIdentities($emailID);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testResendInvitationSenderIdentitiesNegative()
    {    
        $email = "InvalidEmail";
        try {
            $this->senderidentities_api->resendInvitationSenderIdentities($email);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"email\":[\"The field email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testRerequestNegative()
    {    
        $email = "InvalidEmail";
        try {
            $rerequest_senderIdentities_response = $this->senderidentities_api->reRequestSenderIdentitiesRequest($email);
            $this->assertTrue($rerequest_senderIdentities_response != null);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"email\":[\"The field email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteSenderIdentitiesPositive()
    {  
        $emailID = self::$email;
        try {
            $this->senderidentities_api->deleteSenderIdentities($emailID);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteSenderIdentitiesNegative()
    {    
        $email = "InvalidEmail";
        try {
            $this->senderidentities_api->deleteSenderIdentities($email);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"email\":[\"The field email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
