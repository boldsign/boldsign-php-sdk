# BoldSign\PlanApi

All URIs are relative to https://api.boldsign.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiCreditsCount()**](PlanApi.md#apiCreditsCount) | **GET** /v1/plan/apiCreditsCount | Gets the Api credits details. |


## `apiCreditsCount()`

```php
apiCreditsCount(): \BoldSign\Model\BillingViewModel
```

Gets the Api credits details.

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


$apiInstance = new BoldSign\Api\PlanApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->apiCreditsCount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlanApi->apiCreditsCount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BoldSign\Model\BillingViewModel**](../Model/BillingViewModel.md)

### Authorization

[X-API-KEY](../../README.md#X-API-KEY), [Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
