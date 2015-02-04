<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryContentInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a country content data type.
 */
interface CountryContentInterface extends FactoryInterface
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

}
