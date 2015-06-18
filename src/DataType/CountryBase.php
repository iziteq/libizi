<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country data type.
 */
abstract class CountryBase implements CountryInterface
{

    use FactoryTrait;
    use PublishableTrait;
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * The country code.
     *
     * @var string|null
     *   An ISO 3166-1 alpha-2 country code.
     */
    protected $countryCode;

    /**
     * The map.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $map;

    /**
     * The translations.
     *
     * @var \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[]
     */
    protected $translations = [];

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    protected static function createBaseFromData(\stdClass $data)
    {
        $country = new static();
        $country->uuid = $data->uuid;
        $country->revisionHash = $data->hash;
        $country->availableLanguageCodes = $data->languages;
        $country->countryCode = $data->country_code;
        $country->status = $data->status;
        if (isset($data->map)) {
            $country->map = Map::createFromData($data->map);
        }
        if (isset($data->translations)) {
            foreach ($data->translations as $translationData) {
                $country->translations[] = CountryCityTranslation::createFromData($translationData);
            }
        }
        if (isset($data->location)) {
            $country->location = Location::createFromData($data->location);
        }

        return $country;
    }

    public static function createFromData(\stdClass $data)
    {
        if (isset($data->content)) {
            return FullCountry::createFromData($data);
        } else {
            return CompactCountry::createFromData($data);
        }
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getMap()
    {
        return $this->map;
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function getLocation()
    {
        return $this->location;
    }

}
