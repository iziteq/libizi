<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTour.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a compact tour data type.
 */
class CompactTour extends CompactMtgObjectBase implements CompactTourInterface
{

    use TourTrait;
    use PaidDataTrait;

    /**
     * The route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/tour_compact_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $tour */
        $tour = parent::createFromData($data);
        $tour->category = $data->category;
        $tour->duration = $data->duration;
        $tour->distance = $data->distance;
        $tour->placement = $data->placement;
        if (isset($data->route)) {
            $tour->route = $data->route;
        }
        if (isset($data->purchase)) {
           $tour->purchase = Purchase::createFromData($data->purchase);
        }

        return $tour;
    }

    public function getRoute()
    {
        return $this->route;
    }

}
