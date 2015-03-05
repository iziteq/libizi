<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullTour.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full tour data type.
 */
class FullTour extends FullMtgObjectBase implements FullTourInterface
{

    use TourTrait;

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $tour */
        $tour = parent::createFromData($data, $form);
        $tour->category = $data->category;
        $tour->duration = $data->duration;
        $tour->distance = $data->distance;
        $tour->placement = $data->placement;

        return $tour;
    }

}
