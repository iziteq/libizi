<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullTour.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full tour data type.
 */
class FullTour extends FullMtgObjectBase implements FullTourInterface
{

    use TourTrait;

    protected static function getJsonSchemaPath() {
        return Assets::getJsonSchemaPath() . '/mtgobjects/tour_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $tour */
        $tour = parent::createFromData($data);
        $tour->category = $data->category;
        $tour->duration = $data->duration;
        $tour->distance = $data->distance;
        $tour->placement = $data->placement;

        return $tour;
    }

}
