<?php
/**
 * RecipientNotificationSettings
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
 * RecipientNotificationSettings Class Doc Comment
 *
 * @category Class
 * @package  BoldSign
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RecipientNotificationSettings implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RecipientNotificationSettings';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'signature_request' => 'bool',
        'declined' => 'bool',
        'revoked' => 'bool',
        'signed' => 'bool',
        'completed' => 'bool',
        'expired' => 'bool',
        'reassigned' => 'bool',
        'deleted' => 'bool',
        'reminders' => 'bool',
        'edit_recipient' => 'bool',
        'edit_document' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'signature_request' => null,
        'declined' => null,
        'revoked' => null,
        'signed' => null,
        'completed' => null,
        'expired' => null,
        'reassigned' => null,
        'deleted' => null,
        'reminders' => null,
        'edit_recipient' => null,
        'edit_document' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'signature_request' => false,
        'declined' => false,
        'revoked' => false,
        'signed' => false,
        'completed' => false,
        'expired' => false,
        'reassigned' => false,
        'deleted' => false,
        'reminders' => false,
        'edit_recipient' => false,
        'edit_document' => false
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
        'signature_request' => 'signatureRequest',
        'declined' => 'declined',
        'revoked' => 'revoked',
        'signed' => 'signed',
        'completed' => 'completed',
        'expired' => 'expired',
        'reassigned' => 'reassigned',
        'deleted' => 'deleted',
        'reminders' => 'reminders',
        'edit_recipient' => 'editRecipient',
        'edit_document' => 'editDocument'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'signature_request' => 'setSignatureRequest',
        'declined' => 'setDeclined',
        'revoked' => 'setRevoked',
        'signed' => 'setSigned',
        'completed' => 'setCompleted',
        'expired' => 'setExpired',
        'reassigned' => 'setReassigned',
        'deleted' => 'setDeleted',
        'reminders' => 'setReminders',
        'edit_recipient' => 'setEditRecipient',
        'edit_document' => 'setEditDocument'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'signature_request' => 'getSignatureRequest',
        'declined' => 'getDeclined',
        'revoked' => 'getRevoked',
        'signed' => 'getSigned',
        'completed' => 'getCompleted',
        'expired' => 'getExpired',
        'reassigned' => 'getReassigned',
        'deleted' => 'getDeleted',
        'reminders' => 'getReminders',
        'edit_recipient' => 'getEditRecipient',
        'edit_document' => 'getEditDocument'
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
        $this->setIfExists('signature_request', $data ?? [], true);
        $this->setIfExists('declined', $data ?? [], true);
        $this->setIfExists('revoked', $data ?? [], true);
        $this->setIfExists('signed', $data ?? [], true);
        $this->setIfExists('completed', $data ?? [], true);
        $this->setIfExists('expired', $data ?? [], true);
        $this->setIfExists('reassigned', $data ?? [], true);
        $this->setIfExists('deleted', $data ?? [], true);
        $this->setIfExists('reminders', $data ?? [], true);
        $this->setIfExists('edit_recipient', $data ?? [], true);
        $this->setIfExists('edit_document', $data ?? [], true);
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
     * Gets signature_request
     *
     * @return bool|null
     */
    public function getSignatureRequest()
    {
        return $this->container['signature_request'];
    }

    /**
     * Sets signature_request
     *
     * @param bool|null $signature_request signature_request
     *
     * @return self
     */
    public function setSignatureRequest($signature_request)
    {
        if (is_null($signature_request)) {
            throw new \InvalidArgumentException('non-nullable signature_request cannot be null');
        }
        $this->container['signature_request'] = $signature_request;

        return $this;
    }

    /**
     * Gets declined
     *
     * @return bool|null
     */
    public function getDeclined()
    {
        return $this->container['declined'];
    }

    /**
     * Sets declined
     *
     * @param bool|null $declined declined
     *
     * @return self
     */
    public function setDeclined($declined)
    {
        if (is_null($declined)) {
            throw new \InvalidArgumentException('non-nullable declined cannot be null');
        }
        $this->container['declined'] = $declined;

        return $this;
    }

    /**
     * Gets revoked
     *
     * @return bool|null
     */
    public function getRevoked()
    {
        return $this->container['revoked'];
    }

    /**
     * Sets revoked
     *
     * @param bool|null $revoked revoked
     *
     * @return self
     */
    public function setRevoked($revoked)
    {
        if (is_null($revoked)) {
            throw new \InvalidArgumentException('non-nullable revoked cannot be null');
        }
        $this->container['revoked'] = $revoked;

        return $this;
    }

    /**
     * Gets signed
     *
     * @return bool|null
     */
    public function getSigned()
    {
        return $this->container['signed'];
    }

    /**
     * Sets signed
     *
     * @param bool|null $signed signed
     *
     * @return self
     */
    public function setSigned($signed)
    {
        if (is_null($signed)) {
            throw new \InvalidArgumentException('non-nullable signed cannot be null');
        }
        $this->container['signed'] = $signed;

        return $this;
    }

    /**
     * Gets completed
     *
     * @return bool|null
     */
    public function getCompleted()
    {
        return $this->container['completed'];
    }

    /**
     * Sets completed
     *
     * @param bool|null $completed completed
     *
     * @return self
     */
    public function setCompleted($completed)
    {
        if (is_null($completed)) {
            throw new \InvalidArgumentException('non-nullable completed cannot be null');
        }
        $this->container['completed'] = $completed;

        return $this;
    }

    /**
     * Gets expired
     *
     * @return bool|null
     */
    public function getExpired()
    {
        return $this->container['expired'];
    }

    /**
     * Sets expired
     *
     * @param bool|null $expired expired
     *
     * @return self
     */
    public function setExpired($expired)
    {
        if (is_null($expired)) {
            throw new \InvalidArgumentException('non-nullable expired cannot be null');
        }
        $this->container['expired'] = $expired;

        return $this;
    }

    /**
     * Gets reassigned
     *
     * @return bool|null
     */
    public function getReassigned()
    {
        return $this->container['reassigned'];
    }

    /**
     * Sets reassigned
     *
     * @param bool|null $reassigned reassigned
     *
     * @return self
     */
    public function setReassigned($reassigned)
    {
        if (is_null($reassigned)) {
            throw new \InvalidArgumentException('non-nullable reassigned cannot be null');
        }
        $this->container['reassigned'] = $reassigned;

        return $this;
    }

    /**
     * Gets deleted
     *
     * @return bool|null
     */
    public function getDeleted()
    {
        return $this->container['deleted'];
    }

    /**
     * Sets deleted
     *
     * @param bool|null $deleted deleted
     *
     * @return self
     */
    public function setDeleted($deleted)
    {
        if (is_null($deleted)) {
            throw new \InvalidArgumentException('non-nullable deleted cannot be null');
        }
        $this->container['deleted'] = $deleted;

        return $this;
    }

    /**
     * Gets reminders
     *
     * @return bool|null
     */
    public function getReminders()
    {
        return $this->container['reminders'];
    }

    /**
     * Sets reminders
     *
     * @param bool|null $reminders reminders
     *
     * @return self
     */
    public function setReminders($reminders)
    {
        if (is_null($reminders)) {
            throw new \InvalidArgumentException('non-nullable reminders cannot be null');
        }
        $this->container['reminders'] = $reminders;

        return $this;
    }

    /**
     * Gets edit_recipient
     *
     * @return bool|null
     */
    public function getEditRecipient()
    {
        return $this->container['edit_recipient'];
    }

    /**
     * Sets edit_recipient
     *
     * @param bool|null $edit_recipient edit_recipient
     *
     * @return self
     */
    public function setEditRecipient($edit_recipient)
    {
        if (is_null($edit_recipient)) {
            throw new \InvalidArgumentException('non-nullable edit_recipient cannot be null');
        }
        $this->container['edit_recipient'] = $edit_recipient;

        return $this;
    }

    /**
     * Gets edit_document
     *
     * @return bool|null
     */
    public function getEditDocument()
    {
        return $this->container['edit_document'];
    }

    /**
     * Sets edit_document
     *
     * @param bool|null $edit_document edit_document
     *
     * @return self
     */
    public function setEditDocument($edit_document)
    {
        if (is_null($edit_document)) {
            throw new \InvalidArgumentException('non-nullable edit_document cannot be null');
        }
        $this->container['edit_document'] = $edit_document;

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


