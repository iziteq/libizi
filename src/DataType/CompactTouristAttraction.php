<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a compact tourist attraction data type.
 */
class CompactTouristAttraction extends CompactMtgObjectBase implements CompactTouristAttractionInterface
{

    use TouristAttractionTrait;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/common_compact_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $touristAttraction */
        $touristAttraction = parent::createFromData($data);
        $touristAttraction->hidden = $data->hidden;

        return $touristAttraction;
    }

}
