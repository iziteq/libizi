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

    public static function createFromData(\stdClass $data)
    {
        /** @var static $media */
        $media = parent::createFromData($data);
        $media->duration = $data->duration;

        return $media;
    }

    public function getDuration()
    {
        return $this->duration;
    }

}
