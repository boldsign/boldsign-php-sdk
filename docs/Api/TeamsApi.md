# BoldSign\TeamsApi

All URIs are relative to https://api.boldsign.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTeam()**](TeamsApi.md#createTeam) | **POST** /v1/teams/create | Create Team. |
| [**getTeam()**](TeamsApi.md#getTeam) | **GET** /v1/teams/get | Get Team details. |
| [**listTeams()**](TeamsApi.md#listTeams) | **GET** /v1/teams/list | List Teams. |
| [**updateTeam()**](TeamsApi.md#updateTeam) | **PUT** /v1/teams/update | Update Team. |


## `createTeam()`

```php
createTeam($create_team_request): \BoldSign\Model\TeamCreated
```

Create Team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: X-API-KEY
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

// Configure API key authorization: Bearer
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BoldSign\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_team_request = new \BoldSign\Model\CreateTeamRequest(); // \BoldSign\Model\CreateTeamRequest | team creation.

try {
    $result = $apiInstance->createTeam($create_team_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->createTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_team_request** | [**\BoldSign\Model\CreateTeamRequest**](../Model/CreateTeamRequest.md)| team creation. | |

### Return type

[**\BoldSign\Model\TeamCreated**](../Model/TeamCreated.md)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json;odata.metadata=minimal;odata.streaming=true`, `application/json;odata.metadata=minimal;odata.streaming=false`, `application/json;odata.metadata=minimal`, `application/json;odata.metadata=full;odata.streaming=true`, `application/json;odata.metadata=full;odata.streaming=false`, `application/json;odata.metadata=full`, `application/json;odata.metadata=none;odata.streaming=true`, `application/json;odata.metadata=none;odata.streaming=false`, `application/json;odata.metadata=none`, `application/json;odata.streaming=true`, `application/json;odata.streaming=false`, `application/json`, `application/xml`, `application/prs.odatatestxx-odata`, `application/json-patch+json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTeam()`

```php
getTeam($team_id): \BoldSign\Model\TeamResponse
```

Get Team details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: X-API-KEY
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

// Configure API key authorization: Bearer
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BoldSign\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_id = 'team_id_example'; // string | Team Id.

try {
    $result = $apiInstance->getTeam($team_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->getTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **team_id** | **string**| Team Id. | |

### Return type

[**\BoldSign\Model\TeamResponse**](../Model/TeamResponse.md)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTeams()`

```php
listTeams($page, $page_size, $search_key): \BoldSign\Model\TeamListResponse
```

List Teams.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: X-API-KEY
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

// Configure API key authorization: Bearer
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BoldSign\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page index specified in get team list request.
$page_size = 10; // int | Page size specified in get team list request.
$search_key = 'search_key_example'; // string | Teams can be listed by the search key

try {
    $result = $apiInstance->listTeams($page, $page_size, $search_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->listTeams: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page index specified in get team list request. | [default to 1] |
| **page_size** | **int**| Page size specified in get team list request. | [optional] [default to 10] |
| **search_key** | **string**| Teams can be listed by the search key | [optional] |

### Return type

[**\BoldSign\Model\TeamListResponse**](../Model/TeamListResponse.md)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTeam()`

```php
updateTeam($team_update_request)
```

Update Team.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: X-API-KEY
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('X-API-KEY', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-KEY', 'Bearer');

// Configure API key authorization: Bearer
$config = BoldSign\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = BoldSign\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new BoldSign\Api\TeamsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$team_update_request = new \BoldSign\Model\TeamUpdateRequest(); // \BoldSign\Model\TeamUpdateRequest | update team.

try {
    $apiInstance->updateTeam($team_update_request);
} catch (Exception $e) {
    echo 'Exception when calling TeamsApi->updateTeam: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **team_update_request** | [**\BoldSign\Model\TeamUpdateRequest**](../Model/TeamUpdateRequest.md)| update team. | |

### Return type

void (empty response body)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json;odata.metadata=minimal;odata.streaming=true`, `application/json;odata.metadata=minimal;odata.streaming=false`, `application/json;odata.metadata=minimal`, `application/json;odata.metadata=full;odata.streaming=true`, `application/json;odata.metadata=full;odata.streaming=false`, `application/json;odata.metadata=full`, `application/json;odata.metadata=none;odata.streaming=true`, `application/json;odata.metadata=none;odata.streaming=false`, `application/json;odata.metadata=none`, `application/json;odata.streaming=true`, `application/json;odata.streaming=false`, `application/json`, `application/xml`, `application/prs.odatatestxx-odata`, `application/json-patch+json`, `text/json`, `application/*+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
