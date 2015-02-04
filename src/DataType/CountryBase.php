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

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * Created a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param string $countryCode
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[] $translations
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param string $status
     */
    public function __construct(
      $uuid,
      $revisionHash,
      $availableLanguageCodes,
      $countryCode,
      MapInterface $map = null,
      array $translations,
      LocationInterface $location = null,
      $status
    ) {
        $this->uuid = $uuid;
        $this->revisionHash = $revisionHash;
        $this->availableLanguageCodes = $availableLanguageCodes;
        $this->countryCode = $countryCode;
        $this->map = $map;
        $this->translations = $translations;
        $this->location = $location;
        $this->status = $status;
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

    public function isPublished()
    {
        return $this->status == static::STATUS_PUBLISHED;
    }

}
