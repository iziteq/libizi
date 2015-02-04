<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCityInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a city data type in full form.
 */
interface FullCityInterface extends CityInterface
{

    /**
     * Gets the content.
     *
     * @return \Triquanta\IziTravel\DataType\CityContentInterface[]
     */
    public function getContent();

}
