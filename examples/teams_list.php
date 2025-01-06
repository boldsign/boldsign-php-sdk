<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');
// Create a new instance of CreateTeamRequest
$apiInstance = new BoldSign\Api\TeamsApi($config);

$page = 1;
$page_size = 10;
try {
    $result = $apiInstance->listTeams($page, $page_size);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->listTeams: ', $e->getMessage(), PHP_EOL;
}