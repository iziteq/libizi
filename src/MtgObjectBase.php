<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\MtgObject.
 */

namespace Triquanta\IziTravel;

/**
 * Provides an MTG object data type.
 */
abstract class MtgObjectBase implements MtgObjectInterface {

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
   * @var \Triquanta\IziTravel\LocationInterface|null
   */
  protected $location;

  /**
   * The trigger zones.
   *
   * @var \Triquanta\IziTravel\TriggerZoneInterface[]
   */
  protected $triggerZones = [];

  /**
   * The content provider.
   *
   * @var \Triquanta\IziTravel\ContentProviderInterface
   */
  protected $contentProvider;

  /**
   * The purchase.
   *
   * @var \Triquanta\IziTravel\PurchaseInterface|null
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
  protected $visibleOnMaps = FALSE;

  /**
   * Creates a new instance.
   *
   * @param string $uuid
   * @param string[] $available_language_codes
   * @param string $category
   * @param string $status
   * @param \Triquanta\IziTravel\LocationInterface|null $location
   * @param \Triquanta\IziTravel\TriggerZoneInterface[] $trigger_zones
   * @param \Triquanta\IziTravel\ContentProviderInterface $content_provider
   * @param \Triquanta\IziTravel\PurchaseInterface|null $purchase
   * @param int $duration
   * @param int $distance
   * @param string $placement
   * @param bool $visible_on_maps
   */
  public function __construct($uuid, array $available_language_codes, $category, $status, LocationInterface $location = NULL, array $trigger_zones, ContentProviderInterface $content_provider, PurchaseInterface $purchase = NULL, $duration, $distance, $placement, $visible_on_maps) {
    $this->uuid = $uuid;
    $this->availableLanguageCodes = $available_language_codes;
    $this->category = $category;
    $this->status = $status;
    $this->location = $location;
    $this->triggerZones = $trigger_zones;
    $this->contentProvider = $content_provider;
    $this->purchase = $purchase;
    $this->duration = $duration;
    $this->distance = $distance;
    $this->placement = $placement;
    $this->visibleOnMaps = $visible_on_maps;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableLanguageCodes() {
    return $this->availableLanguageCodes;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return $this->status;
  }

  /**
   * {@inheritdoc}
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * {@inheritdoc}
   */
  public function getTriggerZones() {
    return $this->triggerZones;
  }

  /**
   * {@inheritdoc}
   */
  public function getContentProvider() {
    return $this->contentProvider;
  }

  /**
   * {@inheritdoc}
   */
  public function getPurchase() {
    return $this->purchase;
  }

  /**
   * {@inheritdoc}
   */
  public function getDuration() {
    return $this->duration;
  }

  /**
   * {@inheritdoc}
   */
  public function getDistance() {
    return $this->distance;
  }

  /**
   * {@inheritdoc}
   */
  public function getPlacement() {
    return $this->placement;
  }

  /**
   * {@inheritdoc}
   */
  public function isVisibleOnMaps() {
    return $this->visibleOnMaps;
  }

}
