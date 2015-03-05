<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTour.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact tour data type.
 */
class CompactTour extends CompactMtgObjectBase implements CompactTourInterface
{

    use TourTrait;

    /**
     * The route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $tour */
        $tour = parent::createFromData($data, $form);
        $tour->category = $data->category;
        $tour->duration = $data->duration;
        $tour->distance = $data->distance;
        $tour->placement = $data->placement;
        if (isset($data->route)) {
            $tour->route = $data->route;
        }

        return $tour;
    }

    public function getRoute()
    {
        return $this->route;
    }

}
