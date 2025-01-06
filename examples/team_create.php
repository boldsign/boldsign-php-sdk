<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
// Create a new instance of CreateTeamRequest
$apiInstance = new BoldSign\Api\TeamsApi($config);

$create_team_request = new \BoldSign\Model\CreateTeamRequest();
$create_team_request->setTeamName("Team name");
try {
    $result = $apiInstance->createTeam($create_team_request);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->createTeam: ', $e->getMessage(), PHP_EOL;
}
