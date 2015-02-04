<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CityContentInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a city content data type.
 */
interface CityContentInterface extends FactoryInterface
{

    /**
     * Gets the language code.
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
     * Gets the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

}
