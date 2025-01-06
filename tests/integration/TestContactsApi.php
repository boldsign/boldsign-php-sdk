<?php
require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\ContactDetails;
use BoldSign\Model\PhoneNumber;
use BoldSign\Configuration;
use BoldSign\Api\ContactsApi;
use BoldSign\ApiException;
use BoldSign\Model\CreateContactResponse;
use BoldSign\Model\ContactsList;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestContactsApi  extends TestCase
{
    public $contacts_api;
    public static ?string $emailID = null;
    public static ?string $contactId = null;

    /** @var TestContactsApi  */
    
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
        $this->contacts_api = new ContactsApi($config);
        $srting_value = $this->randomNumbers();
        self::$emailID = "prakash.viswanathan+sdk+" . $srting_value . "@syncfusion.com";
    }

    public function testCreateContactsUserPositive()
    {
        $ContactDetails = new ContactDetails();
        $ContactDetails->setName("SDK Testing");
        $ContactDetails->setEmail(self::$emailID);
        $phone_number= new PhoneNumber();
        $phone_number->setNumber('9876545321');
        $phone_number->setCountryCode('+91');
        $ContactDetails->setPhoneNumber($phone_number);        
        try {
            $create_contact_response = $this->contacts_api->createContact([$ContactDetails]);
            $contacts_result = $create_contact_response->getCreatedContacts();
            $this->assertTrue($contacts_result != null);
            self::$contactId = $contacts_result[0]->getId();
            $this->assertInstanceOf(CreateContactResponse::class, $create_contact_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
    
    public function testCreateContactsUserNegative()
    {
        $ContactDetails = new ContactDetails();
        $ContactDetails->setName("SDK Testing");
        $ContactDetails->setEmail("InvaildEmail");
        $phone_number= new PhoneNumber();
        $phone_number->setNumber('9876545321');
        $phone_number->setCountryCode('+91');
        $ContactDetails->setPhoneNumber($phone_number);        
        try {
            $create_contact_response = $this->contacts_api->createContact([$ContactDetails]);
        }catch (ApiException $e) {
           $this->assertTrue($e->getCode() === 400);
           $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"[0].Email\":[\"The field Email is invalid.\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testContactsUserList()
    {        
        try {
            $contacts_user_list_response = $this->contacts_api->contactUserList($page=1,  $page_size=10);
            $contacts_result = $contacts_user_list_response->getResult();
            $this->assertTrue($contacts_result != null);
            $this->assertInstanceOf(ContactsList::class, $contacts_user_list_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetContactPostive()
    {        
        try {
            $get_contacts_user_response = $this->contacts_api->getContact( self::$contactId);
            $contacts_result = $get_contacts_user_response->getId();
            $this->assertTrue($get_contacts_user_response->getId() != null);
            $this->assertTrue($get_contacts_user_response->getEmail() != null);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetContactNegative()
    {        
        try {
            $get_contacts_user_response = $this->contacts_api->getContact("InvaildContactsId");
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"id\":[\"Provide a valid Contact Id\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateContactPostive()
    {
        $ContactDetails = new ContactDetails();
        $ContactDetails->setName("Update contact name");
        $ContactDetails->setEmail(self::$emailID);
        try {
            $this->contacts_api->updateContact( self::$contactId, $ContactDetails);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateContactNegative()
    {
        $ContactDetails = new ContactDetails();
        $ContactDetails->setName("Update contact name");
        $ContactDetails->setEmail(self::$emailID);
        try {
            $this->contacts_api->updateContact( "InvaildContactsId", $ContactDetails);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"id\":[\"Provide a valid Contact Id\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteContactPostive()
    {
        try {
            $this->contacts_api->deleteContacts( self::$contactId);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testDeleteContactNegative()
    {
        try {
            $this->contacts_api->deleteContacts( "InvaildContactsId");
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"id\":[\"Provide a valid Contact Id\"]},") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
