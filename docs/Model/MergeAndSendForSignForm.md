# # MergeAndSendForSignForm

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**files** | **\SplFileObject[]** |  | [optional]
**file_urls** | **string[]** |  | [optional]
**template_ids** | **string[]** |  | [optional]
**use_text_tags** | **bool** |  | [optional]
**text_tag_definitions** | [**\BoldSign\Model\TextTagDefinition[]**](TextTagDefinition.md) |  | [optional]
**document_id** | **string** |  | [optional]
**title** | **string** |  | [optional]
**message** | **string** |  | [optional]
**roles** | [**\BoldSign\Model\Role[]**](Role.md) |  | [optional]
**brand_id** | **string** |  | [optional]
**labels** | **string[]** |  | [optional]
**disable_emails** | **bool** |  | [optional]
**disable_sms** | **bool** |  | [optional] [default to false]
**hide_document_id** | **bool** |  | [optional]
**reminder_settings** | [**\BoldSign\Model\ReminderSettings**](ReminderSettings.md) |  | [optional]
**cc** | [**\BoldSign\Model\DocumentCC[]**](DocumentCC.md) |  | [optional]
**expiry_days** | **int** |  | [optional]
**expiry_date_type** | **string** |  | [optional]
**expiry_value** | **int** |  | [optional] [default to 60]
**enable_print_and_sign** | **bool** |  | [optional]
**enable_reassign** | **bool** |  | [optional]
**enable_signing_order** | **bool** |  | [optional]
**disable_expiry_alert** | **bool** |  | [optional]
**document_info** | [**\BoldSign\Model\DocumentInfo[]**](DocumentInfo.md) |  | [optional]
**on_behalf_of** | **string** |  | [optional]
**is_sandbox** | **bool** |  | [optional]
**role_removal_indices** | **int[]** |  | [optional]
**document_download_option** | **string** |  | [optional]
**meta_data** | **array<string,string>** |  | [optional]
**recipient_notification_settings** | [**\BoldSign\Model\RecipientNotificationSettings**](RecipientNotificationSettings.md) |  | [optional]
**form_groups** | [**\BoldSign\Model\FormGroup[]**](FormGroup.md) |  | [optional]
**remove_form_fields** | **string[]** |  | [optional]
**enable_audit_trail_localization** | **bool** |  | [optional]
**download_file_name** | **string** |  | [optional]
**scheduled_send_time** | **int** |  | [optional]
**allow_scheduled_send** | **bool** |  | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
