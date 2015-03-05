<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full tourist attraction data type.
 */
class FullTouristAttraction extends FullMtgObjectBase implements FullTouristAttractionInterface
{

    use TouristAttractionTrait;

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $touristAttraction */
        $touristAttraction = parent::createFromData($data, $form);
        if (property_exists($data, 'hidden')) {
            $touristAttraction->hidden = $data->hidden;
        }

        return $touristAttraction;
    }

}
