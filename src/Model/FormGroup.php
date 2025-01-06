<?php
/**
 * FormGroup
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
 * FormGroup Class Doc Comment
 *
 * @category Class
 * @package  BoldSign
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FormGroup implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FormGroup';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'group_names' => 'string[]',
        'group_validation' => 'string',
        'minimum_count' => 'int',
        'maximum_count' => 'int',
        'data_sync_tag' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'group_names' => null,
        'group_validation' => null,
        'minimum_count' => 'int32',
        'maximum_count' => 'int32',
        'data_sync_tag' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'group_names' => false,
        'group_validation' => false,
        'minimum_count' => true,
        'maximum_count' => true,
        'data_sync_tag' => true
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
        'group_names' => 'groupNames',
        'group_validation' => 'groupValidation',
        'minimum_count' => 'minimumCount',
        'maximum_count' => 'maximumCount',
        'data_sync_tag' => 'dataSyncTag'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'group_names' => 'setGroupNames',
        'group_validation' => 'setGroupValidation',
        'minimum_count' => 'setMinimumCount',
        'maximum_count' => 'setMaximumCount',
        'data_sync_tag' => 'setDataSyncTag'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'group_names' => 'getGroupNames',
        'group_validation' => 'getGroupValidation',
        'minimum_count' => 'getMinimumCount',
        'maximum_count' => 'getMaximumCount',
        'data_sync_tag' => 'getDataSyncTag'
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

    public const GROUP_VALIDATION_MINIMUM = 'Minimum';
    public const GROUP_VALIDATION_MAXIMUM = 'Maximum';
    public const GROUP_VALIDATION_ABSOLUTE = 'Absolute';
    public const GROUP_VALIDATION_RANGE = 'Range';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getGroupValidationAllowableValues()
    {
        return [
            self::GROUP_VALIDATION_MINIMUM,
            self::GROUP_VALIDATION_MAXIMUM,
            self::GROUP_VALIDATION_ABSOLUTE,
            self::GROUP_VALIDATION_RANGE,
        ];
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
        $this->setIfExists('group_names', $data ?? [], null);
        $this->setIfExists('group_validation', $data ?? [], null);
        $this->setIfExists('minimum_count', $data ?? [], null);
        $this->setIfExists('maximum_count', $data ?? [], null);
        $this->setIfExists('data_sync_tag', $data ?? [], null);
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

        if ($this->container['group_names'] === null) {
            $invalidProperties[] = "'group_names' can't be null";
        }
        if ($this->container['group_validation'] === null) {
            $invalidProperties[] = "'group_validation' can't be null";
        }
        $allowedValues = $this->getGroupValidationAllowableValues();
        if (!is_null($this->container['group_validation']) && !in_array($this->container['group_validation'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'group_validation', must be one of '%s'",
                $this->container['group_validation'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['minimum_count']) && ($this->container['minimum_count'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'minimum_count', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['minimum_count']) && ($this->container['minimum_count'] < 0)) {
            $invalidProperties[] = "invalid value for 'minimum_count', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['maximum_count']) && ($this->container['maximum_count'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'maximum_count', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['maximum_count']) && ($this->container['maximum_count'] < 0)) {
            $invalidProperties[] = "invalid value for 'maximum_count', must be bigger than or equal to 0.";
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
     * Gets group_names
     *
     * @return string[]
     */
    public function getGroupNames()
    {
        return $this->container['group_names'];
    }

    /**
     * Sets group_names
     *
     * @param string[] $group_names group_names
     *
     * @return self
     */
    public function setGroupNames($group_names)
    {
        if (is_null($group_names)) {
            throw new \InvalidArgumentException('non-nullable group_names cannot be null');
        }
        $this->container['group_names'] = $group_names;

        return $this;
    }

    /**
     * Gets group_validation
     *
     * @return string
     */
    public function getGroupValidation()
    {
        return $this->container['group_validation'];
    }

    /**
     * Sets group_validation
     *
     * @param string $group_validation group_validation
     *
     * @return self
     */
    public function setGroupValidation($group_validation)
    {
        if (is_null($group_validation)) {
            throw new \InvalidArgumentException('non-nullable group_validation cannot be null');
        }
        $allowedValues = $this->getGroupValidationAllowableValues();
        if (!in_array($group_validation, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'group_validation', must be one of '%s'",
                    $group_validation,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['group_validation'] = $group_validation;

        return $this;
    }

    /**
     * Gets minimum_count
     *
     * @return int|null
     */
    public function getMinimumCount()
    {
        return $this->container['minimum_count'];
    }

    /**
     * Sets minimum_count
     *
     * @param int|null $minimum_count minimum_count
     *
     * @return self
     */
    public function setMinimumCount($minimum_count)
    {
        if (is_null($minimum_count)) {
            array_push($this->openAPINullablesSetToNull, 'minimum_count');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('minimum_count', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($minimum_count) && ($minimum_count > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $minimum_count when calling FormGroup., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($minimum_count) && ($minimum_count < 0)) {
            throw new \InvalidArgumentException('invalid value for $minimum_count when calling FormGroup., must be bigger than or equal to 0.');
        }

        $this->container['minimum_count'] = $minimum_count;

        return $this;
    }

    /**
     * Gets maximum_count
     *
     * @return int|null
     */
    public function getMaximumCount()
    {
        return $this->container['maximum_count'];
    }

    /**
     * Sets maximum_count
     *
     * @param int|null $maximum_count maximum_count
     *
     * @return self
     */
    public function setMaximumCount($maximum_count)
    {
        if (is_null($maximum_count)) {
            array_push($this->openAPINullablesSetToNull, 'maximum_count');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('maximum_count', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($maximum_count) && ($maximum_count > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $maximum_count when calling FormGroup., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($maximum_count) && ($maximum_count < 0)) {
            throw new \InvalidArgumentException('invalid value for $maximum_count when calling FormGroup., must be bigger than or equal to 0.');
        }

        $this->container['maximum_count'] = $maximum_count;

        return $this;
    }

    /**
     * Gets data_sync_tag
     *
     * @return string|null
     */
    public function getDataSyncTag()
    {
        return $this->container['data_sync_tag'];
    }

    /**
     * Sets data_sync_tag
     *
     * @param string|null $data_sync_tag data_sync_tag
     *
     * @return self
     */
    public function setDataSyncTag($data_sync_tag)
    {
        if (is_null($data_sync_tag)) {
            array_push($this->openAPINullablesSetToNull, 'data_sync_tag');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('data_sync_tag', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['data_sync_tag'] = $data_sync_tag;

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


