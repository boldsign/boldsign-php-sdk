<?php
require_once(__DIR__ . '/../vendor/autoload.php');
// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
$apiInstance = new BoldSign\Api\UserApi($config);
$changeTeam = new BoldSign\Model\ChangeTeamRequest();
$changeTeam->setToTeamId("TEAM_ID");
try {
    $apiInstance->changeTeam("USER_ID",$changeTeam);
    echo 'Successfully changed the team';
} catch (Exception $e) {
    echo 'Exception when calling UserApi->changeTeam: ', $e->getMessage(), PHP_EOL;
}
