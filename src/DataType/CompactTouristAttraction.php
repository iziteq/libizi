<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact tourist attraction data type.
 */
class CompactTouristAttraction extends CompactMtgObjectBase implements CompactTouristAttractionInterface
{

    use TouristAttractionTrait;

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $touristAttraction */
        $touristAttraction = parent::createFromData($data, $form);
        $touristAttraction->hidden = $data->hidden;

        return $touristAttraction;
    }

}
