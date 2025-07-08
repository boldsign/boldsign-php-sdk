# # WebhookEventData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**object** | **string** |  | [optional]
**document_id** | **string** |  | [optional]
**message_title** | **string** |  | [optional]
**document_description** | **string** |  | [optional]
**status** | **string** |  | [optional]
**sender_detail** | [**\BoldSign\Model\DocumentSender**](DocumentSender.md) |  | [optional]
**signer_details** | [**\BoldSign\Model\TemplateSigner[]**](TemplateSigner.md) |  | [optional]
**cc_details** | [**\BoldSign\Model\TemplateCcWebhookModel[]**](TemplateCcWebhookModel.md) |  | [optional]
**on_behalf_of** | **string** |  | [optional]
**created_date** | **\DateTime** |  | [optional]
**expiry_date** | **\DateTime** |  | [optional]
**enable_signing_order** | **bool** |  | [optional]
**disable_emails** | **bool** |  | [optional]
**revoke_message** | **string** |  | [optional]
**error_message** | **string** |  | [optional]
**labels** | **string[]** |  | [optional]
**is_combined_audit** | **bool** |  | [optional]
**brand_id** | **string** |  | [optional]
**document_download_option** | **string** |  | [optional]
**meta_data** | **array<string,string>** |  | [optional]
**template_id** | **string** |  | [optional]
**allow_new_files** | **bool** |  | [optional]
**allow_modify_files** | **bool** |  | [optional]
**activity_date** | **\DateTime** |  | [optional]
**activity_by** | **string** |  | [optional]
**template_name** | **string** |  | [optional]
**template_description** | **string** |  | [optional]
**is_template** | **bool** |  | [optional] [default to false]
**template_labels** | **string[]** |  | [optional]
**id** | **string** |  | [optional]
**name** | **string** |  | [optional]
**email** | **string** |  | [optional]
**modified_date** | **\DateTime** |  | [optional]
**approved_date_time** | **\DateTime** |  | [optional]
**redirect_url** | **string** |  | [optional]
**signer_detail** | [**\BoldSign\Model\DocumentSignerWebhookModel**](DocumentSignerWebhookModel.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
