# # CreateTemplateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** |  |
**description** | **string** |  | [optional]
**document_title** | **string** |  | [optional]
**document_message** | **string** |  | [optional]
**files** | **\SplFileObject[]** |  | [optional]
**file_urls** | **string[]** |  | [optional]
**roles** | [**\BoldSign\Model\TemplateRole[]**](TemplateRole.md) |  | [optional]
**allow_modify_files** | **bool** |  | [optional] [default to true]
**cc** | [**\BoldSign\Model\DocumentCC[]**](DocumentCC.md) |  | [optional]
**brand_id** | **string** |  | [optional]
**allow_message_editing** | **bool** |  | [optional] [default to true]
**allow_new_roles** | **bool** |  | [optional] [default to true]
**allow_new_files** | **bool** |  | [optional] [default to true]
**enable_reassign** | **bool** |  | [optional] [default to true]
**enable_print_and_sign** | **bool** |  | [optional] [default to false]
**enable_signing_order** | **bool** |  | [optional] [default to false]
**document_info** | [**\BoldSign\Model\DocumentInfo[]**](DocumentInfo.md) |  | [optional]
**use_text_tags** | **bool** |  | [optional] [default to false]
**text_tag_definitions** | [**\BoldSign\Model\TextTagDefinition[]**](TextTagDefinition.md) |  | [optional]
**auto_detect_fields** | **bool** |  | [optional] [default to false]
**on_behalf_of** | **string** |  | [optional]
**labels** | **string[]** |  | [optional]
**template_labels** | **string[]** |  | [optional]
**form_groups** | [**\BoldSign\Model\FormGroup[]**](FormGroup.md) |  | [optional]
**recipient_notification_settings** | [**\BoldSign\Model\RecipientNotificationSettings**](RecipientNotificationSettings.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
