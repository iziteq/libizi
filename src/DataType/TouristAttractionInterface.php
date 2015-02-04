<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TouristAttractionInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a tourist attraction data type.
 */
interface TouristAttractionInterface extends MtgObjectInterface
{

    /**
     * Returns whether the object must be visible on maps.
     *
     * @return bool
     */
    public function isVisibleOnMaps();

}
