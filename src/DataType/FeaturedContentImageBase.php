<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedContentImageBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a featured content image.
 */
abstract class FeaturedContentImageBase
{

    use FactoryTrait;
    use UuidTrait;

    /**
     * Constructs a new instance.
     *
     * @param string $uuid
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;

        return new static($data['uuid']);
    }

}
