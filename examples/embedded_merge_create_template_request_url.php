<?php
require_once(__DIR__ . '/../vendor/autoload.php');

// Configure API key authorization: X-API-KEY
$config = new BoldSign\Configuration();
$config->setApiKey('YOUR_API_KEY');

$template_api = new BoldSign\Api\TemplateApi($config);

// Create a role object
$role1 = new \BoldSign\Model\Role();
$role1->setSignerRole("developer");
$role1->setRoleIndex(1);
$role1->setSignerName("david");
$role1->setSignerEmail("david@mail.com");
$role1->setSignerOrder(1);
$role1->setSignerType("Signer");

$role2 = new \BoldSign\Model\Role();
$role2->setSignerRole("Manager");
$role2->setRoleIndex(2);
$role2->setSignerName("sivaramani");
$role2->setSignerEmail("sivaramani.sivaraj@syncfusion.com");
$role2->setSignerOrder(2);
$role1->setSignerOrder(2);
$role1->setSignerType("Signer");

$embedded_merge_template_request_url = new \BoldSign\Model\EmbeddedMergeTemplateFormRequest();
$embedded_merge_template_request_url->setTitle("Embedded Merge Template API");
$embedded_merge_template_request_url->setFiles(["tests/data/doc-1.pdf","tests/data/doc-1.pdf"]);
$embedded_merge_template_request_url->setRoles([$role1,$role2]);
$embedded_merge_template_request_url->setTemplateIds(["YOUR_TEMPLATE_ID1","YOUR_TEMPLATE_ID2"]);
try {    
    $Embedded_template_url = $template_api->mergeCreateEmbeddedRequestUrlTemplate( $embedded_merge_template_request_url);
    echo $Embedded_template_url;
} catch (Exception $e) {
    echo 'Exception when calling TemplateApi->createEmbeddedRequestUrlTemplate: ', $e->getMessage(), PHP_EOL;
}