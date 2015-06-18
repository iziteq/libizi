<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CityBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country data type.
 */
abstract class CityBase implements CityInterface
{

    use FactoryTrait;
    use PublishableTrait;
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * The children.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $children = [];

    /**
     * The country.
     *
     * @var \Triquanta\IziTravel\DataType\CountryInterface|null
     */
    protected $country;

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

    /**
     * The number of child objects.
     *
     * @return int|null
     */
    protected $numberOfChildren;

    /**
     * Whether the object must be visible in listings.
     *
     * @var bool
     */
    protected $visible = false;

    protected static function createBaseFromData(\stdClass $data)
    {
        $city = new static();
        $city->uuid = $data->uuid;
        $city->revisionHash = $data->hash;
        $city->availableLanguageCodes = $data->languages;
        $city->status = $data->status;
        $city->visible = $data->visible;
        if (isset($data->children_count)) {
            $city->numberOfChildren = $data->children_count;
        }
        if (isset($data->country)) {
            $city->country = CountryBase::createFromData($data->country);
        }
        if (isset($data->location)) {
            $city->location = Location::createFromData($data->location);
        }
        if (isset($data->map)) {
            $city->map = Map::createFromData($data->map);
        }
        if (isset($data->translations)) {
            foreach ($data->translations as $translationData) {
                $city->translations[] = CountryCityTranslation::createFromData($translationData);
            }
        }
        if (isset($data->children)) {
            foreach ($data->children as $childData) {
                $city->children[] = MtgObjectBase::createFromData($childData);
            }
        }

        return $city;
    }

    public static function createFromData(\stdClass $data)
    {
        if (isset($data->content)) {
            return FullCity::createFromData($data);
        } else {
            return CompactCity::createFromData($data);
        }
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

    public function isVisible()
    {
        return $this->visible;
    }

}
