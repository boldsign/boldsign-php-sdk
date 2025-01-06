<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$apiInstance = new BoldSign\Api\UserApi($config);

// User details to be updated
$user_id = "YOUR_USER_ID"; 
$new_role = "TeamAdmin"; 

$update_user = new \BoldSign\Model\UpdateUser();
$update_user->setUserRole($new_role);
try {
    $apiInstance->updateUser($update_user); 
    echo 'User role updated successfully.';
} catch (Exception $e) {
    echo 'Exception when calling UserApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
