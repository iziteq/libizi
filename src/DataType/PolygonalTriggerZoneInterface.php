<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PolygonalTriggerZoneInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a polygonal trigger zone.
 */
interface PolygonalTriggerZoneInterface extends TriggerZoneInterface
{

    /**
     * Gets the corners.
     *
     * @return string|null
     *   Sets of coordinates, separated by semicolon. Coordinates are latitude,
     *   longitude, and altitude (in meters), separated by commas.
     */
    public function getCorners();

}
