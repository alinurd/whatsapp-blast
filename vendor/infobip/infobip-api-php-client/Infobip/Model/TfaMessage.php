<?php
/**
 * TfaMessage
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Infobip\Model;

use ArrayAccess;
use Infobip\ObjectSerializer;

/**
 * TfaMessage Class Doc Comment
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class TfaMessage implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TfaMessage';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'applicationId' => 'string',
        'language' => '\Infobip\Model\TfaLanguage',
        'messageId' => 'string',
        'messageText' => 'string',
        'pinLength' => 'int',
        'pinPlaceholder' => 'string',
        'pinType' => '\Infobip\Model\TfaPinType',
        'regional' => '\Infobip\Model\TfaRegionalOptions',
        'repeatDTMF' => 'string',
        'senderId' => 'string',
        'speechRate' => 'double'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'applicationId' => null,
        'language' => null,
        'messageId' => null,
        'messageText' => null,
        'pinLength' => 'int32',
        'pinPlaceholder' => null,
        'pinType' => null,
        'regional' => null,
        'repeatDTMF' => null,
        'senderId' => null,
        'speechRate' => 'double'
    ];

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
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'applicationId' => 'applicationId',
        'language' => 'language',
        'messageId' => 'messageId',
        'messageText' => 'messageText',
        'pinLength' => 'pinLength',
        'pinPlaceholder' => 'pinPlaceholder',
        'pinType' => 'pinType',
        'regional' => 'regional',
        'repeatDTMF' => 'repeatDTMF',
        'senderId' => 'senderId',
        'speechRate' => 'speechRate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'applicationId' => 'setApplicationId',
        'language' => 'setLanguage',
        'messageId' => 'setMessageId',
        'messageText' => 'setMessageText',
        'pinLength' => 'setPinLength',
        'pinPlaceholder' => 'setPinPlaceholder',
        'pinType' => 'setPinType',
        'regional' => 'setRegional',
        'repeatDTMF' => 'setRepeatDTMF',
        'senderId' => 'setSenderId',
        'speechRate' => 'setSpeechRate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'applicationId' => 'getApplicationId',
        'language' => 'getLanguage',
        'messageId' => 'getMessageId',
        'messageText' => 'getMessageText',
        'pinLength' => 'getPinLength',
        'pinPlaceholder' => 'getPinPlaceholder',
        'pinType' => 'getPinType',
        'regional' => 'getRegional',
        'repeatDTMF' => 'getRepeatDTMF',
        'senderId' => 'getSenderId',
        'speechRate' => 'getSpeechRate'
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
        $this->container['applicationId'] = $data['applicationId'] ?? null;
        $this->container['language'] = $data['language'] ?? null;
        $this->container['messageId'] = $data['messageId'] ?? null;
        $this->container['messageText'] = $data['messageText'] ?? null;
        $this->container['pinLength'] = $data['pinLength'] ?? null;
        $this->container['pinPlaceholder'] = $data['pinPlaceholder'] ?? null;
        $this->container['pinType'] = $data['pinType'] ?? null;
        $this->container['regional'] = $data['regional'] ?? null;
        $this->container['repeatDTMF'] = $data['repeatDTMF'] ?? null;
        $this->container['senderId'] = $data['senderId'] ?? null;
        $this->container['speechRate'] = $data['speechRate'] ?? null;
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
     * Gets applicationId
     *
     * @return string|null
     */
    public function getApplicationId()
    {
        return $this->container['applicationId'];
    }

    /**
     * Sets applicationId
     *
     * @param string|null $applicationId The ID of the application that represents your service (e.g. 2FA for login, 2FA for changing the password, etc.) for which the requested message has been created.
     *
     * @return self
     */
    public function setApplicationId($applicationId)
    {
        $this->container['applicationId'] = $applicationId;

        return $this;
    }

    /**
     * Gets language
     *
     * @return \Infobip\Model\TfaLanguage|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param \Infobip\Model\TfaLanguage|null $language The language code which message is written in used when sending text-to-speech messages. If not defined, it will default to English (`en`).
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets messageId
     *
     * @return string|null
     */
    public function getMessageId()
    {
        return $this->container['messageId'];
    }

    /**
     * Sets messageId
     *
     * @param string|null $messageId The ID of the message template (message body with the PIN placeholder) that is sent to the recipient.
     *
     * @return self
     */
    public function setMessageId($messageId)
    {
        $this->container['messageId'] = $messageId;

        return $this;
    }

    /**
     * Gets messageText
     *
     * @return string|null
     */
    public function getMessageText()
    {
        return $this->container['messageText'];
    }

    /**
     * Sets messageText
     *
     * @param string|null $messageText Text of a message that will be sent. Message text must contain `pinPlaceholder`.
     *
     * @return self
     */
    public function setMessageText($messageText)
    {
        $this->container['messageText'] = $messageText;

        return $this;
    }

    /**
     * Gets pinLength
     *
     * @return int|null
     */
    public function getPinLength()
    {
        return $this->container['pinLength'];
    }

    /**
     * Sets pinLength
     *
     * @param int|null $pinLength PIN code length.
     *
     * @return self
     */
    public function setPinLength($pinLength)
    {
        $this->container['pinLength'] = $pinLength;

        return $this;
    }

    /**
     * Gets pinPlaceholder
     *
     * @return string|null
     */
    public function getPinPlaceholder()
    {
        return $this->container['pinPlaceholder'];
    }

    /**
     * Sets pinPlaceholder
     *
     * @param string|null $pinPlaceholder The PIN code placeholder that will be replaced with a generated PIN code.
     *
     * @return self
     */
    public function setPinPlaceholder($pinPlaceholder)
    {
        $this->container['pinPlaceholder'] = $pinPlaceholder;

        return $this;
    }

    /**
     * Gets pinType
     *
     * @return \Infobip\Model\TfaPinType|null
     */
    public function getPinType()
    {
        return $this->container['pinType'];
    }

    /**
     * Sets pinType
     *
     * @param \Infobip\Model\TfaPinType|null $pinType The type of PIN code that will be generated and sent as part of 2FA message. You can set PIN type to numeric, alpha, alphanumeric or hex.
     *
     * @return self
     */
    public function setPinType($pinType)
    {
        $this->container['pinType'] = $pinType;

        return $this;
    }

    /**
     * Gets regional
     *
     * @return \Infobip\Model\TfaRegionalOptions|null
     */
    public function getRegional()
    {
        return $this->container['regional'];
    }

    /**
     * Sets regional
     *
     * @param \Infobip\Model\TfaRegionalOptions|null $regional Region specific parameters, often specified by local laws. Use this if country or region that you are sending SMS to requires some extra parameters.
     *
     * @return self
     */
    public function setRegional($regional)
    {
        $this->container['regional'] = $regional;

        return $this;
    }

    /**
     * Gets repeatDTMF
     *
     * @return string|null
     */
    public function getRepeatDTMF()
    {
        return $this->container['repeatDTMF'];
    }

    /**
     * Sets repeatDTMF
     *
     * @param string|null $repeatDTMF In case PIN message is sent by Voice, DTMF code will enable replaying the message.
     *
     * @return self
     */
    public function setRepeatDTMF($repeatDTMF)
    {
        $this->container['repeatDTMF'] = $repeatDTMF;

        return $this;
    }

    /**
     * Gets senderId
     *
     * @return string|null
     */
    public function getSenderId()
    {
        return $this->container['senderId'];
    }

    /**
     * Sets senderId
     *
     * @param string|null $senderId The name that will appear as the sender of the 2FA message (Example: CompanyName).
     *
     * @return self
     */
    public function setSenderId($senderId)
    {
        $this->container['senderId'] = $senderId;

        return $this;
    }

    /**
     * Gets speechRate
     *
     * @return double|null
     */
    public function getSpeechRate()
    {
        return $this->container['speechRate'];
    }

    /**
     * Sets speechRate
     *
     * @param double|null $speechRate In case PIN message is sent by Voice, the speed of speech can be set for the message. Supported range is from `0.5` to `2`.
     *
     * @return self
     */
    public function setSpeechRate($speechRate)
    {
        $this->container['speechRate'] = $speechRate;

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
    public function offsetGet($offset): mixed
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
    public function jsonSerialize(): mixed
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
