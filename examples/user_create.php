<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\UserApi($config);

// Create a new user instance
$create_user = new \BoldSign\Model\CreateUser();
$create_user->setEmailId("jennyblue@cubeflakes.com");
$create_user->setTeamId("Your Team ID");
$create_user->setUserRole("Admin");
$create_user->setMetaData([
    "Employee" => "Permanent",
    "Department" => "Development",
    "Designation" => "Testing Engineer"
]);
try {
    $apiInstance->createUser([$create_user]);
    echo 'User created successfully!';
} catch (Exception $e) {
    echo 'Exception when calling UserApi->createUser: ', $e->getMessage(), PHP_EOL;
}
