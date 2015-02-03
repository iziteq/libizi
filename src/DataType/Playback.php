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

    /**
     * Creates a new instance.
     *
     * @param string $type
     *   One of the static::TYPE_* constants.
     * @param string[] $uuids
     */
    public function __construct($type, array $uuids)
    {
        $this->type = $type;
        $this->uuids = $uuids;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
              'order' => [],
          ];
        return new static($data['type'], $data['order']);
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
