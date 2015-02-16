<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTourInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a full tour data type.
 */
interface CompactTourInterface extends TourInterface, CompactMtgObjectInterface
{

    /**
     * Gets the route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    public function getRoute();

}
