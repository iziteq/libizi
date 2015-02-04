<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCountryInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a country data type in full form.
 */
interface FullCountryInterface extends CountryInterface
{

    /**
     * Gets the content.
     *
     * @return \Triquanta\IziTravel\DataType\CountryContentInterface[]
     */
    public function getContent();

}
