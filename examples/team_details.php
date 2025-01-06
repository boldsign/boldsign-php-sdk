<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
// Create a new instance of CreateTeamRequest
$apiInstance = new BoldSign\Api\TeamsApi($config);
$team_id = 'YOUR_TEAM_ID';
try {
    $result = $apiInstance->getTeam($team_id);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeam: ', $e->getMessage(), PHP_EOL;
}
