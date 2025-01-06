# BoldSign\SenderIdentitiesApi

All URIs are relative to https://api.boldsign.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSenderIdentities()**](SenderIdentitiesApi.md#createSenderIdentities) | **POST** /v1/senderIdentities/create | Creates sender identity. |
| [**deleteSenderIdentities()**](SenderIdentitiesApi.md#deleteSenderIdentities) | **DELETE** /v1/senderIdentities/delete | Deletes sender identity. |
| [**listSenderIdentities()**](SenderIdentitiesApi.md#listSenderIdentities) | **GET** /v1/senderIdentities/list | Lists sender identity. |
| [**reRequestSenderIdentities()**](SenderIdentitiesApi.md#reRequestSenderIdentities) | **POST** /v1/senderIdentities/rerequest | Rerequests denied sender identity. |
| [**resendInvitationSenderIdentities()**](SenderIdentitiesApi.md#resendInvitationSenderIdentities) | **POST** /v1/senderIdentities/resendInvitation | Resends sender identity invitation. |
| [**updateSenderIdentities()**](SenderIdentitiesApi.md#updateSenderIdentities) | **POST** /v1/senderIdentities/update | Updates sender identity. |


## `createSenderIdentities()`

```php
createSenderIdentities($create_sender_identity_request)
```

Creates sender identity.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_sender_identity_request = new \BoldSign\Model\CreateSenderIdentityRequest(); // \BoldSign\Model\CreateSenderIdentityRequest | The create sender identity request.

try {
    $apiInstance->createSenderIdentities($create_sender_identity_request);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->createSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_sender_identity_request** | [**\BoldSign\Model\CreateSenderIdentityRequest**](../Model/CreateSenderIdentityRequest.md)| The create sender identity request. | |

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

## `deleteSenderIdentities()`

```php
deleteSenderIdentities($email)
```

Deletes sender identity.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | The email address.

try {
    $apiInstance->deleteSenderIdentities($email);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->deleteSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| The email address. | |

### Return type

void (empty response body)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSenderIdentities()`

```php
listSenderIdentities($page, $page_size, $search, $brand_ids): \BoldSign\Model\SenderIdentityList
```

Lists sender identity.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page index specified in get sender identity request.
$page_size = 10; // int | Page size specified in get sender identity list request.
$search = 'search_example'; // string | Users can be listed by the search key present in the sender identity like sender identity name and email address
$brand_ids = array('brand_ids_example'); // string[] | A list of brand IDs to filter associated with the sender identity.

try {
    $result = $apiInstance->listSenderIdentities($page, $page_size, $search, $brand_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->listSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page index specified in get sender identity request. | [default to 1] |
| **page_size** | **int**| Page size specified in get sender identity list request. | [optional] [default to 10] |
| **search** | **string**| Users can be listed by the search key present in the sender identity like sender identity name and email address | [optional] |
| **brand_ids** | [**string[]**](../Model/string.md)| A list of brand IDs to filter associated with the sender identity. | [optional] |

### Return type

[**\BoldSign\Model\SenderIdentityList**](../Model/SenderIdentityList.md)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `reRequestSenderIdentities()`

```php
reRequestSenderIdentities($email)
```

Rerequests denied sender identity.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | The email address.

try {
    $apiInstance->reRequestSenderIdentities($email);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->reRequestSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| The email address. | |

### Return type

void (empty response body)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resendInvitationSenderIdentities()`

```php
resendInvitationSenderIdentities($email)
```

Resends sender identity invitation.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | The email address.

try {
    $apiInstance->resendInvitationSenderIdentities($email);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->resendInvitationSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| The email address. | |

### Return type

void (empty response body)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSenderIdentities()`

```php
updateSenderIdentities($email, $edit_sender_identity_request)
```

Updates sender identity.

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


$apiInstance = new BoldSign\Api\SenderIdentitiesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email = 'email_example'; // string | The email address.
$edit_sender_identity_request = new \BoldSign\Model\EditSenderIdentityRequest(); // \BoldSign\Model\EditSenderIdentityRequest | The create sender identity request.

try {
    $apiInstance->updateSenderIdentities($email, $edit_sender_identity_request);
} catch (Exception $e) {
    echo 'Exception when calling SenderIdentitiesApi->updateSenderIdentities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email** | **string**| The email address. | |
| **edit_sender_identity_request** | [**\BoldSign\Model\EditSenderIdentityRequest**](../Model/EditSenderIdentityRequest.md)| The create sender identity request. | |

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
