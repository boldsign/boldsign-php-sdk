<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\UserRecords;
use BoldSign\Model\UserProperties;
use BoldSign\Configuration;
use BoldSign\Api\UserApi;
use BoldSign\ApiException;
use BoldSign\Model\CreateContactResponse;
use BoldSign\Model\UpdateUser;
use BoldSign\Model\CreateUser;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestUserApi  extends TestCase
{
    public $user_api;
    public static ?string $emailId = null;
    public static ?string $email = null;
    public static ?string $userId = null;

    /** @var TestUserApi  */
    
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
        $this->user_api = new UserApi($config);
        $srting_value = $this->randomNumbers();
        self::$emailId = "prakash.viswanathan+sdk+" . $srting_value . "@syncfusion.com";
    }

    public function testCreateUserPositive()
    {        
        self::$email=self::$emailId;
        $createUserDetails = new CreateUser();
        $createUserDetails->setEmailId(self::$email);
        try {
            $this->user_api->createUser([$createUserDetails]);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateUserNegative()
    {        
        $createUserDetails = new CreateUser();
        $createUserDetails->setEmailId("InvalidEmailId");
        try {
            $this->user_api->createUser([$createUserDetails]);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"[0]\":[\"The email property does not contain a valid email address\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUserListPositive()
    {           
        $page=1;
        $pageSize=10;
        try {
            $list_user_response = $this->user_api->listUsers($page, $pageSize);
            $this->assertTrue($list_user_response != null);
            $this->assertInstanceOf(UserRecords::class, $list_user_response);
            $usersList =$list_user_response->getResult();

            foreach ($usersList as $user) {
                $newEmail = $user->getEmail();
                if ($newEmail === self::$email) {
                    self::$userId = $user->getUserId();
                    break;
                }
            }
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUserListNegative()
    {        
        $page=300;
        $pageSize=250;
        try {
            $list_user_response = $this->user_api->listUsers($page, $pageSize);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetUserPositive()
    {           
        $userId=self::$userId;
        try {
            $get_user_response = $this->user_api->getUser($userId);
            $this->assertTrue($get_user_response != null);
            $this->assertInstanceOf(UserProperties::class, $get_user_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetUserNegative()
    {             
        $userId="InvalidUserID";
        try {
            $get_user_response = $this->user_api->getUser($userId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"userId\":[\"Provide valid user id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateUserNegative()
    {             
        $updateUser = new UpdateUser();
        $updateUser->setUserId("InvalidUserID");
        try {
            $this->user_api->updateUser($updateUser);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"UserId\":[\"Provide valid user id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testResendInvitationPositive()
    {           
        $userId=self::$userId;
        try {
            $this->user_api->resendInvitation($userId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testResendInvitationNegative()
    {             
        $userId="InvalidUserID";
        try {
            $this->user_api->resendInvitation($userId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"UserId\":[\"Provide valid user id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCancelInvitationPositive()
    {           
        $userId=self::$userId;
        try {
            $this->user_api->cancelInvitation($userId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCancelInvitationNegative()
    {             
        $userId="InvalidUserID";
        try {
            $this->user_api->cancelInvitation($userId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"UserId\":[\"Provide valid user id.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
