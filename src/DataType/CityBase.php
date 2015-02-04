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
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

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

    /**
     * Created a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[] $translations
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param string $status
     * @param int|null $numberOfChildren
     * @param bool $visible
     */
    public function __construct(
      $uuid,
      $revisionHash,
      array $availableLanguageCodes,
      MapInterface $map = null,
      array $translations,
      LocationInterface $location = null,
      $status,
      $numberOfChildren,
      $visible
    ) {
        $this->uuid = $uuid;
        $this->revisionHash = $revisionHash;
        $this->availableLanguageCodes = $availableLanguageCodes;
        $this->map = $map;
        $this->translations = $translations;
        $this->location = $location;
        $this->status = $status;
        $this->numberOfChildren = $numberOfChildren;
        $this->visible = $visible;
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

    public function countChildren()
    {
        return $this->numberOfChildren;
    }

    public function isVisible()
    {
        return $this->visible;
    }

}
