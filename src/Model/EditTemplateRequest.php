<?php
/**
 * EditTemplateRequest
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  BoldSign
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * BoldSign API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.8.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace BoldSign\Model;

use \ArrayAccess;
use \BoldSign\ObjectSerializer;

/**
 * EditTemplateRequest Class Doc Comment
 *
 * @category Class
 * @package  BoldSign
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class EditTemplateRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'EditTemplateRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'title' => 'string',
        'description' => 'string',
        'document_title' => 'string',
        'document_message' => 'string',
        'roles' => '\BoldSign\Model\TemplateRole[]',
        'cc' => '\BoldSign\Model\DocumentCC[]',
        'brand_id' => 'string',
        'allow_message_editing' => 'bool',
        'allow_new_roles' => 'bool',
        'allow_new_files' => 'bool',
        'enable_reassign' => 'bool',
        'enable_print_and_sign' => 'bool',
        'enable_signing_order' => 'bool',
        'document_info' => '\BoldSign\Model\DocumentInfo[]',
        'on_behalf_of' => 'string',
        'labels' => 'string[]',
        'template_labels' => 'string[]',
        'form_groups' => '\BoldSign\Model\FormGroup[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'title' => null,
        'description' => null,
        'document_title' => null,
        'document_message' => null,
        'roles' => null,
        'cc' => null,
        'brand_id' => null,
        'allow_message_editing' => null,
        'allow_new_roles' => null,
        'allow_new_files' => null,
        'enable_reassign' => null,
        'enable_print_and_sign' => null,
        'enable_signing_order' => null,
        'document_info' => null,
        'on_behalf_of' => null,
        'labels' => null,
        'template_labels' => null,
        'form_groups' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'title' => true,
        'description' => true,
        'document_title' => true,
        'document_message' => true,
        'roles' => true,
        'cc' => true,
        'brand_id' => true,
        'allow_message_editing' => true,
        'allow_new_roles' => true,
        'allow_new_files' => true,
        'enable_reassign' => true,
        'enable_print_and_sign' => true,
        'enable_signing_order' => true,
        'document_info' => true,
        'on_behalf_of' => true,
        'labels' => true,
        'template_labels' => true,
        'form_groups' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'title' => 'title',
        'description' => 'description',
        'document_title' => 'documentTitle',
        'document_message' => 'documentMessage',
        'roles' => 'roles',
        'cc' => 'cc',
        'brand_id' => 'brandId',
        'allow_message_editing' => 'allowMessageEditing',
        'allow_new_roles' => 'allowNewRoles',
        'allow_new_files' => 'allowNewFiles',
        'enable_reassign' => 'enableReassign',
        'enable_print_and_sign' => 'enablePrintAndSign',
        'enable_signing_order' => 'enableSigningOrder',
        'document_info' => 'documentInfo',
        'on_behalf_of' => 'onBehalfOf',
        'labels' => 'labels',
        'template_labels' => 'templateLabels',
        'form_groups' => 'formGroups'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'title' => 'setTitle',
        'description' => 'setDescription',
        'document_title' => 'setDocumentTitle',
        'document_message' => 'setDocumentMessage',
        'roles' => 'setRoles',
        'cc' => 'setCc',
        'brand_id' => 'setBrandId',
        'allow_message_editing' => 'setAllowMessageEditing',
        'allow_new_roles' => 'setAllowNewRoles',
        'allow_new_files' => 'setAllowNewFiles',
        'enable_reassign' => 'setEnableReassign',
        'enable_print_and_sign' => 'setEnablePrintAndSign',
        'enable_signing_order' => 'setEnableSigningOrder',
        'document_info' => 'setDocumentInfo',
        'on_behalf_of' => 'setOnBehalfOf',
        'labels' => 'setLabels',
        'template_labels' => 'setTemplateLabels',
        'form_groups' => 'setFormGroups'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'title' => 'getTitle',
        'description' => 'getDescription',
        'document_title' => 'getDocumentTitle',
        'document_message' => 'getDocumentMessage',
        'roles' => 'getRoles',
        'cc' => 'getCc',
        'brand_id' => 'getBrandId',
        'allow_message_editing' => 'getAllowMessageEditing',
        'allow_new_roles' => 'getAllowNewRoles',
        'allow_new_files' => 'getAllowNewFiles',
        'enable_reassign' => 'getEnableReassign',
        'enable_print_and_sign' => 'getEnablePrintAndSign',
        'enable_signing_order' => 'getEnableSigningOrder',
        'document_info' => 'getDocumentInfo',
        'on_behalf_of' => 'getOnBehalfOf',
        'labels' => 'getLabels',
        'template_labels' => 'getTemplateLabels',
        'form_groups' => 'getFormGroups'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('title', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('document_title', $data ?? [], null);
        $this->setIfExists('document_message', $data ?? [], null);
        $this->setIfExists('roles', $data ?? [], null);
        $this->setIfExists('cc', $data ?? [], null);
        $this->setIfExists('brand_id', $data ?? [], null);
        $this->setIfExists('allow_message_editing', $data ?? [], null);
        $this->setIfExists('allow_new_roles', $data ?? [], null);
        $this->setIfExists('allow_new_files', $data ?? [], null);
        $this->setIfExists('enable_reassign', $data ?? [], null);
        $this->setIfExists('enable_print_and_sign', $data ?? [], null);
        $this->setIfExists('enable_signing_order', $data ?? [], null);
        $this->setIfExists('document_info', $data ?? [], null);
        $this->setIfExists('on_behalf_of', $data ?? [], null);
        $this->setIfExists('labels', $data ?? [], null);
        $this->setIfExists('template_labels', $data ?? [], null);
        $this->setIfExists('form_groups', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['title']) && (mb_strlen($this->container['title']) > 256)) {
            $invalidProperties[] = "invalid value for 'title', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['title']) && (mb_strlen($this->container['title']) < 0)) {
            $invalidProperties[] = "invalid value for 'title', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['description']) && (mb_strlen($this->container['description']) > 5000)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 5000.";
        }

        if (!is_null($this->container['description']) && (mb_strlen($this->container['description']) < 0)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['document_title']) && (mb_strlen($this->container['document_title']) > 256)) {
            $invalidProperties[] = "invalid value for 'document_title', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['document_title']) && (mb_strlen($this->container['document_title']) < 0)) {
            $invalidProperties[] = "invalid value for 'document_title', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['document_message']) && (mb_strlen($this->container['document_message']) > 5000)) {
            $invalidProperties[] = "invalid value for 'document_message', the character length must be smaller than or equal to 5000.";
        }

        if (!is_null($this->container['document_message']) && (mb_strlen($this->container['document_message']) < 0)) {
            $invalidProperties[] = "invalid value for 'document_message', the character length must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title title
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (is_null($title)) {
            array_push($this->openAPINullablesSetToNull, 'title');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('title', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($title) && (mb_strlen($title) > 256)) {
            throw new \InvalidArgumentException('invalid length for $title when calling EditTemplateRequest., must be smaller than or equal to 256.');
        }
        if (!is_null($title) && (mb_strlen($title) < 0)) {
            throw new \InvalidArgumentException('invalid length for $title when calling EditTemplateRequest., must be bigger than or equal to 0.');
        }

        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            array_push($this->openAPINullablesSetToNull, 'description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($description) && (mb_strlen($description) > 5000)) {
            throw new \InvalidArgumentException('invalid length for $description when calling EditTemplateRequest., must be smaller than or equal to 5000.');
        }
        if (!is_null($description) && (mb_strlen($description) < 0)) {
            throw new \InvalidArgumentException('invalid length for $description when calling EditTemplateRequest., must be bigger than or equal to 0.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets document_title
     *
     * @return string|null
     */
    public function getDocumentTitle()
    {
        return $this->container['document_title'];
    }

    /**
     * Sets document_title
     *
     * @param string|null $document_title document_title
     *
     * @return self
     */
    public function setDocumentTitle($document_title)
    {
        if (is_null($document_title)) {
            array_push($this->openAPINullablesSetToNull, 'document_title');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('document_title', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($document_title) && (mb_strlen($document_title) > 256)) {
            throw new \InvalidArgumentException('invalid length for $document_title when calling EditTemplateRequest., must be smaller than or equal to 256.');
        }
        if (!is_null($document_title) && (mb_strlen($document_title) < 0)) {
            throw new \InvalidArgumentException('invalid length for $document_title when calling EditTemplateRequest., must be bigger than or equal to 0.');
        }

        $this->container['document_title'] = $document_title;

        return $this;
    }

    /**
     * Gets document_message
     *
     * @return string|null
     */
    public function getDocumentMessage()
    {
        return $this->container['document_message'];
    }

    /**
     * Sets document_message
     *
     * @param string|null $document_message document_message
     *
     * @return self
     */
    public function setDocumentMessage($document_message)
    {
        if (is_null($document_message)) {
            array_push($this->openAPINullablesSetToNull, 'document_message');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('document_message', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($document_message) && (mb_strlen($document_message) > 5000)) {
            throw new \InvalidArgumentException('invalid length for $document_message when calling EditTemplateRequest., must be smaller than or equal to 5000.');
        }
        if (!is_null($document_message) && (mb_strlen($document_message) < 0)) {
            throw new \InvalidArgumentException('invalid length for $document_message when calling EditTemplateRequest., must be bigger than or equal to 0.');
        }

        $this->container['document_message'] = $document_message;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return \BoldSign\Model\TemplateRole[]|null
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param \BoldSign\Model\TemplateRole[]|null $roles roles
     *
     * @return self
     */
    public function setRoles($roles)
    {
        if (is_null($roles)) {
            array_push($this->openAPINullablesSetToNull, 'roles');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('roles', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['roles'] = $roles;

        return $this;
    }

    /**
     * Gets cc
     *
     * @return \BoldSign\Model\DocumentCC[]|null
     */
    public function getCc()
    {
        return $this->container['cc'];
    }

    /**
     * Sets cc
     *
     * @param \BoldSign\Model\DocumentCC[]|null $cc cc
     *
     * @return self
     */
    public function setCc($cc)
    {
        if (is_null($cc)) {
            array_push($this->openAPINullablesSetToNull, 'cc');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cc', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cc'] = $cc;

        return $this;
    }

    /**
     * Gets brand_id
     *
     * @return string|null
     */
    public function getBrandId()
    {
        return $this->container['brand_id'];
    }

    /**
     * Sets brand_id
     *
     * @param string|null $brand_id brand_id
     *
     * @return self
     */
    public function setBrandId($brand_id)
    {
        if (is_null($brand_id)) {
            array_push($this->openAPINullablesSetToNull, 'brand_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('brand_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['brand_id'] = $brand_id;

        return $this;
    }

    /**
     * Gets allow_message_editing
     *
     * @return bool|null
     */
    public function getAllowMessageEditing()
    {
        return $this->container['allow_message_editing'];
    }

    /**
     * Sets allow_message_editing
     *
     * @param bool|null $allow_message_editing allow_message_editing
     *
     * @return self
     */
    public function setAllowMessageEditing($allow_message_editing)
    {
        if (is_null($allow_message_editing)) {
            array_push($this->openAPINullablesSetToNull, 'allow_message_editing');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('allow_message_editing', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['allow_message_editing'] = $allow_message_editing;

        return $this;
    }

    /**
     * Gets allow_new_roles
     *
     * @return bool|null
     */
    public function getAllowNewRoles()
    {
        return $this->container['allow_new_roles'];
    }

    /**
     * Sets allow_new_roles
     *
     * @param bool|null $allow_new_roles allow_new_roles
     *
     * @return self
     */
    public function setAllowNewRoles($allow_new_roles)
    {
        if (is_null($allow_new_roles)) {
            array_push($this->openAPINullablesSetToNull, 'allow_new_roles');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('allow_new_roles', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['allow_new_roles'] = $allow_new_roles;

        return $this;
    }

    /**
     * Gets allow_new_files
     *
     * @return bool|null
     */
    public function getAllowNewFiles()
    {
        return $this->container['allow_new_files'];
    }

    /**
     * Sets allow_new_files
     *
     * @param bool|null $allow_new_files allow_new_files
     *
     * @return self
     */
    public function setAllowNewFiles($allow_new_files)
    {
        if (is_null($allow_new_files)) {
            array_push($this->openAPINullablesSetToNull, 'allow_new_files');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('allow_new_files', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['allow_new_files'] = $allow_new_files;

        return $this;
    }

    /**
     * Gets enable_reassign
     *
     * @return bool|null
     */
    public function getEnableReassign()
    {
        return $this->container['enable_reassign'];
    }

    /**
     * Sets enable_reassign
     *
     * @param bool|null $enable_reassign enable_reassign
     *
     * @return self
     */
    public function setEnableReassign($enable_reassign)
    {
        if (is_null($enable_reassign)) {
            array_push($this->openAPINullablesSetToNull, 'enable_reassign');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('enable_reassign', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['enable_reassign'] = $enable_reassign;

        return $this;
    }

    /**
     * Gets enable_print_and_sign
     *
     * @return bool|null
     */
    public function getEnablePrintAndSign()
    {
        return $this->container['enable_print_and_sign'];
    }

    /**
     * Sets enable_print_and_sign
     *
     * @param bool|null $enable_print_and_sign enable_print_and_sign
     *
     * @return self
     */
    public function setEnablePrintAndSign($enable_print_and_sign)
    {
        if (is_null($enable_print_and_sign)) {
            array_push($this->openAPINullablesSetToNull, 'enable_print_and_sign');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('enable_print_and_sign', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['enable_print_and_sign'] = $enable_print_and_sign;

        return $this;
    }

    /**
     * Gets enable_signing_order
     *
     * @return bool|null
     */
    public function getEnableSigningOrder()
    {
        return $this->container['enable_signing_order'];
    }

    /**
     * Sets enable_signing_order
     *
     * @param bool|null $enable_signing_order enable_signing_order
     *
     * @return self
     */
    public function setEnableSigningOrder($enable_signing_order)
    {
        if (is_null($enable_signing_order)) {
            array_push($this->openAPINullablesSetToNull, 'enable_signing_order');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('enable_signing_order', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['enable_signing_order'] = $enable_signing_order;

        return $this;
    }

    /**
     * Gets document_info
     *
     * @return \BoldSign\Model\DocumentInfo[]|null
     */
    public function getDocumentInfo()
    {
        return $this->container['document_info'];
    }

    /**
     * Sets document_info
     *
     * @param \BoldSign\Model\DocumentInfo[]|null $document_info document_info
     *
     * @return self
     */
    public function setDocumentInfo($document_info)
    {
        if (is_null($document_info)) {
            array_push($this->openAPINullablesSetToNull, 'document_info');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('document_info', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['document_info'] = $document_info;

        return $this;
    }

    /**
     * Gets on_behalf_of
     *
     * @return string|null
     */
    public function getOnBehalfOf()
    {
        return $this->container['on_behalf_of'];
    }

    /**
     * Sets on_behalf_of
     *
     * @param string|null $on_behalf_of on_behalf_of
     *
     * @return self
     */
    public function setOnBehalfOf($on_behalf_of)
    {
        if (is_null($on_behalf_of)) {
            array_push($this->openAPINullablesSetToNull, 'on_behalf_of');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('on_behalf_of', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['on_behalf_of'] = $on_behalf_of;

        return $this;
    }

    /**
     * Gets labels
     *
     * @return string[]|null
     */
    public function getLabels()
    {
        return $this->container['labels'];
    }

    /**
     * Sets labels
     *
     * @param string[]|null $labels labels
     *
     * @return self
     */
    public function setLabels($labels)
    {
        if (is_null($labels)) {
            array_push($this->openAPINullablesSetToNull, 'labels');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('labels', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['labels'] = $labels;

        return $this;
    }

    /**
     * Gets template_labels
     *
     * @return string[]|null
     */
    public function getTemplateLabels()
    {
        return $this->container['template_labels'];
    }

    /**
     * Sets template_labels
     *
     * @param string[]|null $template_labels template_labels
     *
     * @return self
     */
    public function setTemplateLabels($template_labels)
    {
        if (is_null($template_labels)) {
            array_push($this->openAPINullablesSetToNull, 'template_labels');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('template_labels', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['template_labels'] = $template_labels;

        return $this;
    }

    /**
     * Gets form_groups
     *
     * @return \BoldSign\Model\FormGroup[]|null
     */
    public function getFormGroups()
    {
        return $this->container['form_groups'];
    }

    /**
     * Sets form_groups
     *
     * @param \BoldSign\Model\FormGroup[]|null $form_groups form_groups
     *
     * @return self
     */
    public function setFormGroups($form_groups)
    {
        if (is_null($form_groups)) {
            array_push($this->openAPINullablesSetToNull, 'form_groups');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('form_groups', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['form_groups'] = $form_groups;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


