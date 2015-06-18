<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full tourist attraction data type.
 */
class FullTouristAttraction extends FullMtgObjectBase implements FullTouristAttractionInterface
{

    use TouristAttractionTrait;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/attraction_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $touristAttraction */
        $touristAttraction = parent::createFromData($data);
        if (property_exists($data, 'hidden')) {
            $touristAttraction->hidden = $data->hidden;
        }

        return $touristAttraction;
    }

}
