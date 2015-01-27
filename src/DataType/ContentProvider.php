<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContentProviderInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a content provider data type.
 */
class ContentProvider implements ContentProviderInterface
{

    use UuidTrait;

    /**
     * The copyright message.
     *
     * @var string|null
     */
    protected $copyrightMessage;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $name
     * @param string $copyright_message
     */
    public function __construct($uuid, $name, $copyright_message)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->copyrightMessage = $copyright_message;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data + [
            'copyright' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($json);
        }
        return new static($data['uuid'], $data['name'], $data['copyright']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getCopyrightMessage()
    {
        return $this->copyrightMessage;
    }

}
