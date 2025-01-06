<?php
/**
 * BrandCustomFieldDetails
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
 * BrandCustomFieldDetails Class Doc Comment
 *
 * @category Class
 * @package  BoldSign
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BrandCustomFieldDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BrandCustomFieldDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'field_name' => 'string',
        'field_description' => 'string',
        'field_order' => 'int',
        'brand_id' => 'string',
        'shared_field' => 'bool',
        'form_field' => '\BoldSign\Model\CustomFormField'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'field_name' => null,
        'field_description' => null,
        'field_order' => 'int32',
        'brand_id' => null,
        'shared_field' => null,
        'form_field' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'field_name' => true,
        'field_description' => true,
        'field_order' => false,
        'brand_id' => true,
        'shared_field' => false,
        'form_field' => false
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
        'field_name' => 'fieldName',
        'field_description' => 'fieldDescription',
        'field_order' => 'fieldOrder',
        'brand_id' => 'brandId',
        'shared_field' => 'sharedField',
        'form_field' => 'formField'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'field_name' => 'setFieldName',
        'field_description' => 'setFieldDescription',
        'field_order' => 'setFieldOrder',
        'brand_id' => 'setBrandId',
        'shared_field' => 'setSharedField',
        'form_field' => 'setFormField'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'field_name' => 'getFieldName',
        'field_description' => 'getFieldDescription',
        'field_order' => 'getFieldOrder',
        'brand_id' => 'getBrandId',
        'shared_field' => 'getSharedField',
        'form_field' => 'getFormField'
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
        $this->setIfExists('field_name', $data ?? [], null);
        $this->setIfExists('field_description', $data ?? [], null);
        $this->setIfExists('field_order', $data ?? [], 1);
        $this->setIfExists('brand_id', $data ?? [], null);
        $this->setIfExists('shared_field', $data ?? [], null);
        $this->setIfExists('form_field', $data ?? [], null);
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
     * Gets field_name
     *
     * @return string|null
     */
    public function getFieldName()
    {
        return $this->container['field_name'];
    }

    /**
     * Sets field_name
     *
     * @param string|null $field_name field_name
     *
     * @return self
     */
    public function setFieldName($field_name)
    {
        if (is_null($field_name)) {
            array_push($this->openAPINullablesSetToNull, 'field_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('field_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['field_name'] = $field_name;

        return $this;
    }

    /**
     * Gets field_description
     *
     * @return string|null
     */
    public function getFieldDescription()
    {
        return $this->container['field_description'];
    }

    /**
     * Sets field_description
     *
     * @param string|null $field_description field_description
     *
     * @return self
     */
    public function setFieldDescription($field_description)
    {
        if (is_null($field_description)) {
            array_push($this->openAPINullablesSetToNull, 'field_description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('field_description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['field_description'] = $field_description;

        return $this;
    }

    /**
     * Gets field_order
     *
     * @return int|null
     */
    public function getFieldOrder()
    {
        return $this->container['field_order'];
    }

    /**
     * Sets field_order
     *
     * @param int|null $field_order field_order
     *
     * @return self
     */
    public function setFieldOrder($field_order)
    {
        if (is_null($field_order)) {
            throw new \InvalidArgumentException('non-nullable field_order cannot be null');
        }
        $this->container['field_order'] = $field_order;

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
     * Gets shared_field
     *
     * @return bool|null
     */
    public function getSharedField()
    {
        return $this->container['shared_field'];
    }

    /**
     * Sets shared_field
     *
     * @param bool|null $shared_field shared_field
     *
     * @return self
     */
    public function setSharedField($shared_field)
    {
        if (is_null($shared_field)) {
            throw new \InvalidArgumentException('non-nullable shared_field cannot be null');
        }
        $this->container['shared_field'] = $shared_field;

        return $this;
    }

    /**
     * Gets form_field
     *
     * @return \BoldSign\Model\CustomFormField|null
     */
    public function getFormField()
    {
        return $this->container['form_field'];
    }

    /**
     * Sets form_field
     *
     * @param \BoldSign\Model\CustomFormField|null $form_field form_field
     *
     * @return self
     */
    public function setFormField($form_field)
    {
        if (is_null($form_field)) {
            throw new \InvalidArgumentException('non-nullable form_field cannot be null');
        }
        $this->container['form_field'] = $form_field;

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


