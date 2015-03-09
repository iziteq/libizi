<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PolygonalTriggerZone.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a polygonal trigger zone.
 */
class PolygonalTriggerZone implements PolygonalTriggerZoneInterface
{
    use FactoryTrait;

    /**
     * The corners.
     *
     * @var string|null
     */
    protected $corners;

    public static function createFromData(\stdClass $data, $form = null)
    {
        $triggerZone = new static();
        if (isset($data->polygon_corners)) {
            $triggerZone->corners = $data->polygon_corners;
        }

        return $triggerZone;
    }

    public function getCorners()
    {
        return $this->corners;
    }

}
