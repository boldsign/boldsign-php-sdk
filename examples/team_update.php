<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
// Create a new instance of CreateTeamRequest
$apiInstance = new BoldSign\Api\TeamsApi($config);

// Team ID to update
$teamId = "YOUR_TEAM_ID";
// Create an instance of the TeamUpdateRequest model
$team_update_request = new \BoldSign\Model\TeamUpdateRequest();
// Updated team details
$team_update_request->setTeamId("YOUR_TEAM_ID");
$team_update_request->setTeamName("New team name");
try {
    $apiInstance->updateTeam($team_update_request);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->updateTeam: ', $e->getMessage(), PHP_EOL;
}
