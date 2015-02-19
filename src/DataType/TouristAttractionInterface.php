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
     * Returns whether the object is hidden.
     *
     * @return bool
     */
    public function isHidden();

}
