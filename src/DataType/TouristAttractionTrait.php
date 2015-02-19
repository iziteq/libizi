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
     * Whether the object is hidden.
     *
     * @var bool
     */
    protected $hidden = false;

    public function isHidden()
    {
        return $this->hidden;
    }

}
