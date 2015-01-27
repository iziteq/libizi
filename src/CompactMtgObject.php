<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\CompactMtgObject.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a compact MTG object data type.
 */
class CompactMtgObject extends MtgObjectBase implements CompactMtgObjectInterface {

  /**
   * The language code.
   *
   * @return string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $languageCode;

  /**
   * The route.
   *
   * @return string|null
   *   The route coordinates in KML format.
   */
  protected $route;

  /**
   * The title.
   *
   * @return string
   */
  protected $title;

  /**
   * The summary.
   *
   * @return string
   */
  protected $summary;

  /**
   * The images.
   *
   * @return \Triquanta\IziTravel\MediaInterface[]
   */
  protected $images = [];

  /**
   * The number of child objects.
   *
   * @return int|null
   */
  protected $numberOfChildren;

  /**
   * Creates a new instance.
   *
   * @oaram string $uuid
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
   * @param string $language_code
   * @param string|null $route
   * @param string $title
   * @param string $summary;
   * @param \Triquanta\IziTravel\MediaInterface[] $images
   * @param int|null $number_of_children
   */
  public function __construct($uuid, array $available_language_codes, $category, $status, LocationInterface $location = NULL, array $trigger_zones, ContentProviderInterface $content_provider, PurchaseInterface $purchase = NULL, $duration, $distance, $placement, $visible_on_maps, $language_code, $route, $title, $summary, array $images, $number_of_children) {
    parent::__construct($uuid, $available_language_codes, $category, $status, $location, $trigger_zones, $content_provider, $purchase, $duration, $distance, $placement, $visible_on_maps);
    $this->languageCode = $language_code;
    $this->route = $route;
    $this->title = $title;
    $this->summary = $summary;
    $this->images = $images;
    $this->numberOfChildren = $number_of_children;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    // @todo This method was copied from FullMtgObject. Finish porting it to work with compact MTG objects.
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data + [
      'location' => NULL,
      'purchase' => NULL,
      'duration' => NULL,
      'distance' => NULL,
      'placement' => NULL,
      'hidden' => NULL,
      'route' => NULL,
      'children_count' => NULL,
    ];
    if (!isset($data['uuid'])) {
      throw new MissingUuidFactoryException($json);
    }

    $location = $data['location'] ? Location::createFromJson(json_encode($data['location'])) : NULL;
    $trigger_zones = [];
    foreach ($data['trigger_zones'] as $trigger_zone_data) {
      $trigger_zones[] = TriggerZone::createFromJson(json_encode($trigger_zone_data));
    }
    $content_provider = $data['content_provider'] ? ContentProvider::createFromJson(json_encode($data['content_provider'])) : NULL;
    $purchase = $data['purchase'] ? Purchase::createFromJson(json_encode($data['purchase'])) : NULL;
    $images = [];
    foreach ($data['images'] as $image_data) {
      $images[] = Media::createFromJson(json_encode($image_data));
    }
    return new static($data['uuid'], $data['languages'], $data['category'], $data['status'], $location, $trigger_zones, $content_provider, $purchase, $data['duration'], $data['distance'], $data['placement'], !$data['hidden'], $data['language'], $data['route'], $data['title'], $data['summary'], $images, $data['children_count']);
  }

  /**
   * {@inheritdoc}
   */
  public function getLanguageCode() {
    return $this->languageCode;
  }

  /**
   * {@inheritdoc}
   */
  public function getRoute() {
    return $this->route;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * {@inheritdoc}
   */
  public function getSummary() {
    return $this->summary;
  }

  /**
   * {@inheritdoc}
   */
  public function getImages() {
    return $this->images;
  }

  /**
   * {@inheritdoc}
   */
  public function countChildren() {
    return $this->numberOfChildren;
  }

}
