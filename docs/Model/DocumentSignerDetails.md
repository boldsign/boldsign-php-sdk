# # DocumentSignerDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**signer_name** | **string** |  | [optional]
**signer_role** | **string** |  | [optional]
**signer_email** | **string** |  | [optional]
**status** | **string** |  | [optional]
**enable_access_code** | **bool** |  | [optional]
**is_authentication_failed** | **bool** |  | [optional] [default to false]
**enable_email_otp** | **bool** |  | [optional]
**authentication_type** | **string** |  | [optional]
**is_delivery_failed** | **bool** |  | [optional] [default to false]
**is_viewed** | **bool** |  | [optional] [default to false]
**order** | **int** |  | [optional] [default to 0]
**signer_type** | **string** |  | [optional] [default to 'Signer']
**host_email** | **string** |  | [optional]
**host_name** | **string** |  | [optional]
**is_reassigned** | **bool** |  | [optional]
**private_message** | **string** |  | [optional]
**allow_field_configuration** | **bool** |  | [optional]
**form_fields** | [**\BoldSign\Model\DocumentFormFields[]**](DocumentFormFields.md) |  | [optional]
**language** | **int** | &lt;p&gt;Description:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;i&gt;0&lt;/i&gt; - None&lt;/li&gt;&lt;li&gt;&lt;i&gt;1&lt;/i&gt; - English&lt;/li&gt;&lt;li&gt;&lt;i&gt;2&lt;/i&gt; - Spanish&lt;/li&gt;&lt;li&gt;&lt;i&gt;3&lt;/i&gt; - German&lt;/li&gt;&lt;li&gt;&lt;i&gt;4&lt;/i&gt; - French&lt;/li&gt;&lt;li&gt;&lt;i&gt;5&lt;/i&gt; - Romanian&lt;/li&gt;&lt;li&gt;&lt;i&gt;6&lt;/i&gt; - Norwegian&lt;/li&gt;&lt;li&gt;&lt;i&gt;7&lt;/i&gt; - Bulgarian&lt;/li&gt;&lt;li&gt;&lt;i&gt;8&lt;/i&gt; - Italian&lt;/li&gt;&lt;li&gt;&lt;i&gt;9&lt;/i&gt; - Danish&lt;/li&gt;&lt;li&gt;&lt;i&gt;10&lt;/i&gt; - Polish&lt;/li&gt;&lt;li&gt;&lt;i&gt;11&lt;/i&gt; - Portuguese&lt;/li&gt;&lt;li&gt;&lt;i&gt;12&lt;/i&gt; - Czech&lt;/li&gt;&lt;li&gt;&lt;i&gt;13&lt;/i&gt; - Dutch&lt;/li&gt;&lt;li&gt;&lt;i&gt;14&lt;/i&gt; - Swedish&lt;/li&gt;&lt;li&gt;&lt;i&gt;15&lt;/i&gt; - Russian&lt;/li&gt;&lt;/ul&gt; | [optional]
**locale** | **string** |  | [optional]
**phone_number** | [**\BoldSign\Model\PhoneNumber**](PhoneNumber.md) |  | [optional]
**id_verification** | [**\BoldSign\Model\IdVerification**](IdVerification.md) |  | [optional]
**recipient_notification_settings** | [**\BoldSign\Model\RecipientNotificationSettings**](RecipientNotificationSettings.md) |  | [optional]
**authentication_retry_count** | **int** |  | [optional]
**enable_qes** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
