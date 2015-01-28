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

    use FactoryTrait;
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
     * @param string $copyrightMessage
     */
    public function __construct($uuid, $name, $copyrightMessage)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->copyrightMessage = $copyrightMessage;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'copyright' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        return new static($data['uuid'], $data['name'], $data['copyright']);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCopyrightMessage()
    {
        return $this->copyrightMessage;
    }

}
