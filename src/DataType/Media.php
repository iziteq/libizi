<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Media.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a media data type.
 */
class Media implements MediaInterface
{

    use FactoryTrait;
    use UuidTrait;

    /**
     * The type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

    /**
     * The order.
     *
     * @var int
     */
    protected $order;

    /**
     * The duration.
     *
     * @var int
     *   The duration in seconds.
     */
    protected $duration;

    /**
     * The URL.
     *
     * @var string|null
     */
    protected $url;

    /**
     * The title.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $type
     * @param int $order
     * @param int $duration
     * @param string|null $url
     * @param string|null $title
     */
    public function __construct($uuid, $type, $order, $duration, $url, $title)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->order = $order;
        $this->duration = $duration;
        $this->url = $url;
        $this->title = $title;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
              // Duration is marked "mandatory" in the API documentation, yet is not
              // available in the example, nor can it technically be available for all
              // media types.
            'duration' => null,
            'url' => null,
            'title' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        return new static($data['uuid'], $data['type'], $data['order'],
          $data['duration'], $data['url'], $data['title']);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
