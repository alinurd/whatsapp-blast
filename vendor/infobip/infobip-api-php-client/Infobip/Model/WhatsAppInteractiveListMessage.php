<?php
/**
 * WhatsAppInteractiveListMessage
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
 * WhatsAppInteractiveListMessage Class Doc Comment
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class WhatsAppInteractiveListMessage implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'WhatsAppInteractiveListMessage';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'from' => 'string',
        'to' => 'string',
        'messageId' => 'string',
        'content' => '\Infobip\Model\WhatsAppInteractiveListContent',
        'callbackData' => 'string',
        'notifyUrl' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'from' => null,
        'to' => null,
        'messageId' => null,
        'content' => null,
        'callbackData' => null,
        'notifyUrl' => null
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
        'from' => 'from',
        'to' => 'to',
        'messageId' => 'messageId',
        'content' => 'content',
        'callbackData' => 'callbackData',
        'notifyUrl' => 'notifyUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'from' => 'setFrom',
        'to' => 'setTo',
        'messageId' => 'setMessageId',
        'content' => 'setContent',
        'callbackData' => 'setCallbackData',
        'notifyUrl' => 'setNotifyUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'from' => 'getFrom',
        'to' => 'getTo',
        'messageId' => 'getMessageId',
        'content' => 'getContent',
        'callbackData' => 'getCallbackData',
        'notifyUrl' => 'getNotifyUrl'
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
        $this->container['from'] = $data['from'] ?? null;
        $this->container['to'] = $data['to'] ?? null;
        $this->container['messageId'] = $data['messageId'] ?? null;
        $this->container['content'] = $data['content'] ?? null;
        $this->container['callbackData'] = $data['callbackData'] ?? null;
        $this->container['notifyUrl'] = $data['notifyUrl'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['from'] === null) {
            $invalidProperties[] = "'from' can't be null";
        }
        if ((mb_strlen($this->container['from']) > 24)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be smaller than or equal to 24.";
        }

        if ((mb_strlen($this->container['from']) < 1)) {
            $invalidProperties[] = "invalid value for 'from', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['to'] === null) {
            $invalidProperties[] = "'to' can't be null";
        }
        if ((mb_strlen($this->container['to']) > 24)) {
            $invalidProperties[] = "invalid value for 'to', the character length must be smaller than or equal to 24.";
        }

        if ((mb_strlen($this->container['to']) < 1)) {
            $invalidProperties[] = "invalid value for 'to', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['messageId']) && (mb_strlen($this->container['messageId']) > 50)) {
            $invalidProperties[] = "invalid value for 'messageId', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['messageId']) && (mb_strlen($this->container['messageId']) < 0)) {
            $invalidProperties[] = "invalid value for 'messageId', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['content'] === null) {
            $invalidProperties[] = "'content' can't be null";
        }
        if (!is_null($this->container['callbackData']) && (mb_strlen($this->container['callbackData']) > 4000)) {
            $invalidProperties[] = "invalid value for 'callbackData', the character length must be smaller than or equal to 4000.";
        }

        if (!is_null($this->container['callbackData']) && (mb_strlen($this->container['callbackData']) < 0)) {
            $invalidProperties[] = "invalid value for 'callbackData', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['notifyUrl']) && (mb_strlen($this->container['notifyUrl']) > 2048)) {
            $invalidProperties[] = "invalid value for 'notifyUrl', the character length must be smaller than or equal to 2048.";
        }

        if (!is_null($this->container['notifyUrl']) && (mb_strlen($this->container['notifyUrl']) < 0)) {
            $invalidProperties[] = "invalid value for 'notifyUrl', the character length must be bigger than or equal to 0.";
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
     * Gets from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param string $from Registered WhatsApp sender number. Must be in international format and comply with [WhatsApp's requirements](https://www.infobip.com/docs/whatsapp/get-started#phone-number-what-you-need-to-know).
     *
     * @return self
     */
    public function setFrom($from)
    {
        if ((mb_strlen($from) > 24)) {
            throw new \InvalidArgumentException('invalid length for $from when calling WhatsAppInteractiveListMessage., must be smaller than or equal to 24.');
        }
        if ((mb_strlen($from) < 1)) {
            throw new \InvalidArgumentException('invalid length for $from when calling WhatsAppInteractiveListMessage., must be bigger than or equal to 1.');
        }

        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param string $to Message recipient number. Must be in international format.
     *
     * @return self
     */
    public function setTo($to)
    {
        if ((mb_strlen($to) > 24)) {
            throw new \InvalidArgumentException('invalid length for $to when calling WhatsAppInteractiveListMessage., must be smaller than or equal to 24.');
        }
        if ((mb_strlen($to) < 1)) {
            throw new \InvalidArgumentException('invalid length for $to when calling WhatsAppInteractiveListMessage., must be bigger than or equal to 1.');
        }

        $this->container['to'] = $to;

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
     * @param string|null $messageId The ID that uniquely identifies the message sent.
     *
     * @return self
     */
    public function setMessageId($messageId)
    {
        if (!is_null($messageId) && (mb_strlen($messageId) > 50)) {
            throw new \InvalidArgumentException('invalid length for $messageId when calling WhatsAppInteractiveListMessage., must be smaller than or equal to 50.');
        }
        if (!is_null($messageId) && (mb_strlen($messageId) < 0)) {
            throw new \InvalidArgumentException('invalid length for $messageId when calling WhatsAppInteractiveListMessage., must be bigger than or equal to 0.');
        }

        $this->container['messageId'] = $messageId;

        return $this;
    }

    /**
     * Gets content
     *
     * @return \Infobip\Model\WhatsAppInteractiveListContent
     */
    public function getContent()
    {
        return $this->container['content'];
    }

    /**
     * Sets content
     *
     * @param \Infobip\Model\WhatsAppInteractiveListContent $content content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->container['content'] = $content;

        return $this;
    }

    /**
     * Gets callbackData
     *
     * @return string|null
     */
    public function getCallbackData()
    {
        return $this->container['callbackData'];
    }

    /**
     * Sets callbackData
     *
     * @param string|null $callbackData Custom client data that will be included in a [Delivery Report](#channels/whatsapp/receive-whatsapp-delivery-reports).
     *
     * @return self
     */
    public function setCallbackData($callbackData)
    {
        if (!is_null($callbackData) && (mb_strlen($callbackData) > 4000)) {
            throw new \InvalidArgumentException('invalid length for $callbackData when calling WhatsAppInteractiveListMessage., must be smaller than or equal to 4000.');
        }
        if (!is_null($callbackData) && (mb_strlen($callbackData) < 0)) {
            throw new \InvalidArgumentException('invalid length for $callbackData when calling WhatsAppInteractiveListMessage., must be bigger than or equal to 0.');
        }

        $this->container['callbackData'] = $callbackData;

        return $this;
    }

    /**
     * Gets notifyUrl
     *
     * @return string|null
     */
    public function getNotifyUrl()
    {
        return $this->container['notifyUrl'];
    }

    /**
     * Sets notifyUrl
     *
     * @param string|null $notifyUrl The URL on your callback server to which delivery and seen reports will be sent. [Delivery report format](#channels/whatsapp/receive-whatsapp-delivery-reports), [Seen report format](#channels/whatsapp/receive-whatsapp-seen-reports).
     *
     * @return self
     */
    public function setNotifyUrl($notifyUrl)
    {
        if (!is_null($notifyUrl) && (mb_strlen($notifyUrl) > 2048)) {
            throw new \InvalidArgumentException('invalid length for $notifyUrl when calling WhatsAppInteractiveListMessage., must be smaller than or equal to 2048.');
        }
        if (!is_null($notifyUrl) && (mb_strlen($notifyUrl) < 0)) {
            throw new \InvalidArgumentException('invalid length for $notifyUrl when calling WhatsAppInteractiveListMessage., must be bigger than or equal to 0.');
        }

        $this->container['notifyUrl'] = $notifyUrl;

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
