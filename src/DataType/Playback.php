<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Playback.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a playback data type.
 */
class Playback implements PlaybackInterface
{

    use FactoryTrait;

    /**
     * The type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

    /**
     * The UUIDs.
     *
     * @var string[]
     */
    protected $uuids = [];

    public static function createFromData(\stdClass $data)
    {
        $playback = new static();
        $playback->type = $data->type;
        if (isset($data->order)) {
            $playback->uuids = $data->order;
        }

        return $playback;
    }

    public function isRandom()
    {
        return $this->getType() == static::TYPE_RANDOM;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isSequential()
    {
        return $this->getType() == static::TYPE_SEQUENTIAL;
    }

    public function getUuids()
    {
        return $this->uuids;
    }

}
