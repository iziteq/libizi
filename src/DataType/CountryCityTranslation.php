<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryCityTranslation.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country/city translation data type.
 */
class CountryCityTranslation implements CountryCityTranslationInterface
{

    use FactoryTrait;

    /**
     * The country/city name.
     *
     * @return string
     */
    protected $name;

    /**
     * The language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    public static function createFromData(\stdClass $data)
    {
        $translation = new static();
        $translation->name = $data->name;
        $translation->languageCode = $data->language;

        return $translation;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

}
