<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PlayableMediaBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a playable media data type.
 */
abstract class PlayableMediaBase extends MediaBase implements PlayableMediaInterface
{

    /**
     * The duration.
     *
     * @var int
     *   The duration in seconds.
     */
    protected $duration;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $type
     * @param int $order
     * @param string|null $url
     * @param string|null $title
     * @param int $duration
     */
    public function __construct($uuid, $type, $order, $url, $title, $duration)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->order = $order;
        $this->url = $url;
        $this->title = $title;
        $this->duration = $duration;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'duration' => null,
            'url' => null,
            'title' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        return new static($data['uuid'], $data['type'], $data['order'],
          $data['url'], $data['title'], $data['duration']);
    }

    public function getDuration()
    {
        return $this->duration;
    }

}
