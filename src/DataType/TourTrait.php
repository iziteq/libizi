<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TourTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\TourInterface.
 */
trait TourTrait
{

    /**
     * Gets the category.
     *
     * @var string
     *   One of the static::CATEGORY_* constants.
     */
    protected $category;

    /**
     * The duration.
     *
     * @var int|null
     *   The duration in seconds.
     */
    protected $duration;

    /**
     * The distance.
     *
     * @var int|null
     *   The distance in meters.
     */
    protected $distance;

    /**
     * The placement.
     *
     * @var string|null
     *   One of the static::PLACEMENT_* constants.
     */
    protected $placement;

    public function getCategory()
    {
        return $this->category;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getPlacement()
    {
        return $this->placement;
    }

}
