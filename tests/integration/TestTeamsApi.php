<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

use BoldSign\Model\CreateTeamRequest;
use BoldSign\Model\TeamResponse;
use BoldSign\Configuration;
use BoldSign\Api\TeamsApi;
use BoldSign\ApiException;
use BoldSign\Model\CreateContactResponse;
use BoldSign\Model\TeamListResponse;
use BoldSign\Model\TeamCreated;
use BoldSign\Model\TeamUpdateRequest;
use PHPUnit\Framework\TestCase;

define('API_KEY', getenv('BoldSignAPIKey'));
define('Host', getenv('BoldSignURL'));

class TestTeamsApi  extends TestCase
{
    public $teams_api;
    public static ?string $teamName = null;
    public static ?string $teamId = null;
    public static ?string $updateTeamName = null;

    /** @var TestTeamsApi  */
    
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
        $this->teams_api = new TeamsApi($config);
        $srting_value = $this->randomNumbers();
        self::$teamName = "PHP_SDK". $srting_value;
        self::$updateTeamName = "Updated Team Name". $srting_value;
    }

    public function testCreateTeamPositive()
    {        
        $createTeamDetails = new CreateTeamRequest();
        $createTeamDetails->setTeamName(self::$teamName);
        try {
            $create_teams_response = $this->teams_api->createTeam($createTeamDetails);
            $teamId = $create_teams_response->getTeamId();
            $this->assertTrue($teamId != null);
            $this->assertInstanceOf(TeamCreated::class, $create_teams_response);
            self::$teamId = $teamId;
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testCreateTeamNegative()
    {
        try {
            $createTeamDetails = new CreateTeamRequest();
            $create_teams_response = $this->teams_api->createTeam($createTeamDetails);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"TeamName\":[\"The TeamName field is required.\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTeamListPositive()
    {        
        $page=1;
        $pageSize=10;
        try {
            $list_teams_response = $this->teams_api->listTeams($page, $pageSize);
            $this->assertTrue($list_teams_response != null);
            $this->assertInstanceOf(TeamListResponse::class, $list_teams_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testTeamListNegative()
    {        
        $page=300;
        $pageSize=250;
        try {
            $list_teams_response = $this->teams_api->listTeams($page, $pageSize);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"PageSize\":[\"Provide a valid page size between 1 and 100\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetTeamPositive()
    {        
        //Team Id
        $teamId=self::$teamId;
        try {
            $get_team_response = $this->teams_api->getTeam($teamId);
            $this->assertTrue($get_team_response != null);
            $this->assertInstanceOf(TeamResponse::class, $get_team_response);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testGetTeamNegative()
    {        
        //Team Id
        $teamId="InvalidTeamID";
        try {
            $get_team_response = $this->teams_api->getTeam($teamId);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"teamId\":[\"Please provide valid team ID\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateTeamPositive()
    {        
        //Team Update Request
        $teamUpdateRequest= new TeamUpdateRequest();
        $teamUpdateRequest->setTeamId(self::$teamId);
        $teamUpdateRequest->setTeamName(self::$updateTeamName);
        try {
            $this->teams_api->updateTeam($teamUpdateRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->fail("API Exception occurred: " . $e->getMessage());
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }

    public function testUpdateTeamNegative()
    {        
        //Team Update Request
        $teamUpdateRequest= new TeamUpdateRequest();
        $teamUpdateRequest->setTeamId('InvalidTeamID');
        $teamUpdateRequest->setTeamName(self::$updateTeamName);
        try {
            $this->teams_api->updateTeam($teamUpdateRequest);
            $this->assertTrue(true);
        }catch (ApiException $e) {
            $this->assertTrue($e->getCode() === 400);
            $this->assertTrue(strpos($e->getMessage(), "{\"errors\":{\"TeamId\":[\"Please provide valid team ID\"]}") !== false);
        } catch (Exception $e) {
            $this->fail("Unexpected exception occurred: " . $e->getMessage());
        } finally {
            sleep(5); // Sleep for 5 seconds
        }
    }
}
