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
     *   Comma separated list of poligon latitude, longitude, altitude.
     *
     * @todo Find out and document the format, as the example does not contain
     *   altitudes.
     */
    public function getCorners();

}
