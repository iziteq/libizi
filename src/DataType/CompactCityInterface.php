<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCityInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a city data type in compact form.
 */
interface CompactCityInterface extends CityInterface
{

    /**
     * Gets the language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Gets the summary.
     *
     * @return string
     */
    public function getSummary();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

}
