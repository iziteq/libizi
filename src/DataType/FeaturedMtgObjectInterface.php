<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedMtgObjectInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a featured MTG Object.
 */
interface FeaturedMtgObjectInterface extends FeaturedContentInterface
{

    /**
     * Gets the UUID of the city this content belongs to.
     *
     * @return string|null
     */
    public function getCityUuid();

    /**
     * Gets the UUID of the country this content belongs to.
     *
     * @return string|null
     */
    public function getCountryUuid();

}
