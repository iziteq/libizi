<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TourInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a tour data type.
 */
interface TourInterface extends MtgObjectInterface, PaidDataInterface
{

    /**
     * A walking tour.
     */
    const CATEGORY_WALK = 'walk';

    /**
     * A biking tour.
     */
    const CATEGORY_BIKE = 'bike';

    /**
     * A bus tour.
     */
    const CATEGORY_BUS = 'bus';

    /**
     * A tour by car.
     */
    const CATEGORY_CAR = 'car';

    /**
     * A tour by boat.
     */
    const CATEGORY_BOAT = 'boat';

    /**
     * An indoor object.
     */
    const PLACEMENT_INDOOR = 'indoor';

    /**
     * A outdoor object.
     */
    const PLACEMENT_OUTDOOR = 'outdoor';

    /**
     * Gets the category.
     *
     * @return string
     *   One of the static::CATEGORY_* constants.
     */
    public function getCategory();

    /**
     * Gets the duration.
     *
     * @return int|null
     *   The duration in seconds.
     */
    public function getDuration();

    /**
     * Gets the distance.
     *
     * @return int|null
     *   The distance in meters.
     */
    public function getDistance();

    /**
     * Gets the placement.
     *
     * @return string|null
     *   One of the static::PLACEMENT_* constants.
     */
    public function getPlacement();

}
