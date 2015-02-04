<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TouristAttractionTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\TouristAttractionInterface.
 */
trait TouristAttractionTrait
{

    /**
     * Whether the object must be visible on maps.
     *
     * @var bool
     */
    protected $visibleOnMaps = false;

    public function isVisibleOnMaps()
    {
        return $this->visibleOnMaps;
    }

}
