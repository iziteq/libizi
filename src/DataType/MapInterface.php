<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MapInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a map data type.
 */
interface MapInterface extends FactoryInterface
{

    /**
     * Gets the bounds.
     *
     * @return string
     *   The bounds are represented as WGS:84 in the OpenLayers Bounds format -
     *   left, bottom, right, top.
     *   Example: 36.0123075,122.0978486,36.0176986,122.0911837
     */
    public function getBounds();

    /**
     * Gets the route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    public function getRoute();

}
