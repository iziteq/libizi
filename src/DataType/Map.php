<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Map.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a map data type.
 */
class Map implements MapInterface
{

    use FactoryTrait;

    /**
     * The bounds.
     *
     * @var string
     *   The bounds are represented as WGS:84 in the OpenLayers Bounds format -
     *   left, bottom, right, top.
     *   Example: 36.0123075,122.0978486,36.0176986,122.0911837
     */
    protected $bounds;

    /**
     * The route.
     *
     * @var string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    public static function createFromData(\stdClass $data)
    {
        $map = new static();
        $map->bounds = $data->bounds;
        if (isset($data->route)) {
            $map->route = $data->route;
        }

        return $map;
    }

    /**
     * Gets the bounds.
     *
     * @return string
     *   The bounds are represented as WGS:84 in the OpenLayers Bounds format -
     *   left, bottom, right, top.
     *   Example: 36.0123075,122.0978486,36.0176986,122.0911837
     */
    public function getBounds()
    {
        return $this->bounds;
    }

    /**
     * Gets the route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    public function getRoute()
    {
        return $this->route;
    }

}
