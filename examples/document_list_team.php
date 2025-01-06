<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\DocumentApi($config);

$page = 1;
$user_id = array('USER_ID');
$team_id = array('TEAM_ID');
$transmit_type = 'Sent';
$page_size = 10; 
try {
    $result = $apiInstance->teamDocuments($page, $user_id, $team_id, $transmit_type, $page_size);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->teamDocuments: ', $e->getMessage(), PHP_EOL;
}   