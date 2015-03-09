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

    public static function createFromData(\stdClass $data)
    {
        $image = new static();
        $image->uuid = $data->uuid;

        return $image;
    }

}
