<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MtgObject.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an MTG object data type.
 */
abstract class MtgObjectBase implements MtgObjectInterface
{

    use UuidTrait;

    /**
     * The language codes for available translations.
     *
     * @var string[]
     *   Values are ISO 639-1 alpha-2 language codes.
     */
    protected $availableLanguageCodes = [];

    /**
     * Gets the category.
     *
     * @var string
     *   One of the static::CATEGORY_* constants.
     */
    protected $category;

    /**
     * Whether the object is published.
     *
     * @return bool
     */
    protected $status;

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    /**
     * The trigger zones.
     *
     * @var \Triquanta\IziTravel\DataType\TriggerZoneInterface[]
     */
    protected $triggerZones = [];

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    /**
     * The purchase.
     *
     * @var \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    protected $purchase;

    /**
     * The duration.
     *
     * @var int|null
     *   The duration in seconds.
     */
    protected $duration;

    /**
     * The distance.
     *
     * @var int|null
     *   The distance in meters.
     */
    protected $distance;

    /**
     * The placement.
     *
     * @var string|null
     *   One of the static::PLACEMENT_* constants.
     */
    protected $placement;

    /**
     * Whether the object must be visible on maps.
     *
     * @var bool
     */
    protected $visibleOnMaps = false;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string[] $availableLanguageCodes
     * @param string $category
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param \Triquanta\IziTravel\DataType\TriggerZoneInterface[] $triggerZones
     * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $contentProvider
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface|null $purchase
     * @param int $duration
     * @param int $distance
     * @param string $placement
     * @param bool $visibleOnMaps
     */
    public function __construct(
      $uuid,
      array $availableLanguageCodes,
      $category,
      $status,
      LocationInterface $location = null,
      array $triggerZones,
      ContentProviderInterface $contentProvider,
      PurchaseInterface $purchase = null,
      $duration,
      $distance,
      $placement,
      $visibleOnMaps
    ) {
        $this->uuid = $uuid;
        $this->availableLanguageCodes = $availableLanguageCodes;
        $this->category = $category;
        $this->status = $status;
        $this->location = $location;
        $this->triggerZones = $triggerZones;
        $this->contentProvider = $contentProvider;
        $this->purchase = $purchase;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->placement = $placement;
        $this->visibleOnMaps = $visibleOnMaps;
    }

    public function getAvailableLanguageCodes()
    {
        return $this->availableLanguageCodes;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function isPublished()
    {
        return $this->status;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getTriggerZones()
    {
        return $this->triggerZones;
    }

    public function getContentProvider()
    {
        return $this->contentProvider;
    }

    public function getPurchase()
    {
        return $this->purchase;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getPlacement()
    {
        return $this->placement;
    }

    public function isVisibleOnMaps()
    {
        return $this->visibleOnMaps;
    }

}
