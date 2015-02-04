<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryCityTranslationInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a country/city translation data type.
 */
interface CountryCityTranslationInterface extends FactoryInterface
{

    /**
     * Gets the country/city name.
     *
     * @return string
     */
    public function getName();

    /**
     * Gets the language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

}
