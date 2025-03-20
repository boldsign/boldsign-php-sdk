<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Configuration;
use BoldSign\Api\PlanApi;
use BoldSign\Model\BillingViewModel;
use BoldSign\ApiException;
use PHPUnit\Framework\TestCase;

define('APIKEY', getenv('API_KEY'));
define('Host', getenv('HOST_URL'));

class TestPlanApi  extends TestCase
{
    public $plan_api;

    /** @var TestPlanApi  */

    public function setUp(): void
    {     
        //Configure API key authorization: X-API-KEY
        $config = new Configuration();
        $config->setApiKey(APIKEY);
        $config->setHost(Host);
        $this->plan_api = new PlanApi($config);
    }

    public function testApiCreditsCount()
    {  
        try {
            $api_cedits_count_response = $this->plan_api->apiCreditsCount();
            $this->assertTrue($api_cedits_count_response != null);
            $this->assertInstanceOf(BillingViewModel::class, $api_cedits_count_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
