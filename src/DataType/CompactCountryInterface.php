<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCountryInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a country data type in compact form.
 */
interface CompactCountryInterface extends CountryInterface
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

}
