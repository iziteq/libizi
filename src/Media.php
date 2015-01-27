<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Media.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a media data type.
 */
class Media implements MediaInterface
{

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
              // Duration is marked "mandatory" in the API documentation, yet is not
              // available in the example, nor can it technically be available for all
              // media types.
            'duration' => null,
            'url' => null,
            'title' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($json);
        }
        return new static($data['uuid'], $data['type'], $data['order'],
          $data['duration'], $data['url'], $data['title']);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * {@inheritdoc}
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

}
