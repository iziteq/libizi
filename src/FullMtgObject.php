<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\FullMtgObject.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a full MTG object data type.
 */
class FullMtgObject extends MtgObjectBase implements FullMtgObjectInterface {

  /**
   * The UUID of the parent object.
   *
   * @var string|null
   */
  protected $parentUuid;

  /**
   * The schedule.
   *
   * @var \Triquanta\IziTravel\ScheduleInterface|null
   */
  protected $schedule;

  /**
   * The contact information.
   *
   * @var \Triquanta\IziTravel\ContactInformationInterface|null
   */
  protected $contactInformation;

  /**
   * The map.
   *
   * @var \Triquanta\IziTravel\MapInterface|null
   */
  protected $map;

  /**
   * The content.
   *
   * @var \Triquanta\IziTravel\ContentInterface[]
   */
  protected $content;

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
   * @param string $parent_uuid
   * @param \Triquanta\IziTravel\ScheduleInterface|null $schedule
   * @param \Triquanta\IziTravel\ContactInformationInterface|null $contact_information
   * @param \Triquanta\IziTravel\MapInterface|null $map
   * @param \Triquanta\IziTravel\ContentInterface[] $content
   */
  public function __construct($uuid, array $available_language_codes, $category, $status, LocationInterface $location = NULL, array $trigger_zones, ContentProviderInterface $content_provider, PurchaseInterface $purchase = NULL, $duration, $distance, $placement, $visible_on_maps, $parent_uuid, ScheduleInterface $schedule = NULL, ContactInformationInterface $contact_information = NULL, MapInterface $map = NULL, array $content) {
    parent::__construct($uuid, $available_language_codes, $category, $status, $location, $trigger_zones, $content_provider, $purchase, $duration, $distance, $placement, $visible_on_maps);
    $this->parentUuid = $parent_uuid;
    $this->schedule = $schedule;
    $this->contactInformation = $contact_information;
    $this->map = $map;
    $this->content = $content;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
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
      'parent_uuid' => NULL,
      'schedule' => NULL,
      'contact' => NULL,
      'map' => NULL,
      'content' => NULL,
      'hidden' => NULL,
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
    $schedule = $data['schedule'] ? Schedule::createFromJson(json_encode($data['schedule'])) : NULL;
    $contact_information = $data['contact'] ? ContactInformation::createFromJson(json_encode($data['contact'])) : NULL;
    $map = $data['map'] ? Map::createFromJson(json_encode($data['map'])) : NULL;
    $content = [];
    foreach ($data['content'] as $content_data) {
      $content[] = Content::createFromJson(json_encode($content_data));
    }
    return new static($data['uuid'], $data['languages'], $data['category'], $data['status'], $location, $trigger_zones, $content_provider, $purchase, $data['duration'], $data['distance'], $data['placement'], !$data['hidden'], $data['parent_uuid'], $schedule, $contact_information, $map, $content);
  }

  /**
   * {@inheritdoc}
   */
  public function getParentUuid() {
    return $this->parentUuid;
  }

  /**
   * {@inheritdoc}
   */
  public function getSchedule() {
    return $this->schedule;
  }

  /**
   * {@inheritdoc}
   */
  public function getContactInformation() {
    return $this->contactInformation;
  }

  /**
   * {@inheritdoc}
   */
  public function getMap() {
    return $this->map;
  }

  /**
   * {@inheritdoc}
   */
  public function getContent() {
    return $this->content;
  }

}
