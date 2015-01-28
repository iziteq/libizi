<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMtgObject.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full MTG object data type.
 */
class FullMtgObject extends MtgObjectBase implements FullMtgObjectInterface
{

    use FactoryTrait;

    /**
     * The UUID of the parent object.
     *
     * @var string|null
     */
    protected $parentUuid;

    /**
     * The schedule.
     *
     * @var \Triquanta\IziTravel\DataType\ScheduleInterface|null
     */
    protected $schedule;

    /**
     * The contact information.
     *
     * @var \Triquanta\IziTravel\DataType\ContactInformationInterface|null
     */
    protected $contactInformation;

    /**
     * The map.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $map;

    /**
     * The content.
     *
     * @var \Triquanta\IziTravel\DataType\ContentInterface[]
     */
    protected $content;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string[] $available_language_codes
     * @param string $category
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param \Triquanta\IziTravel\DataType\TriggerZoneInterface[] $trigger_zones
     * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $content_provider
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface|null $purchase
     * @param int $duration
     * @param int $distance
     * @param string $placement
     * @param bool $visible_on_maps
     * @param string $parent_uuid
     * @param \Triquanta\IziTravel\DataType\ScheduleInterface|null $schedule
     * @param \Triquanta\IziTravel\DataType\ContactInformationInterface|null $contact_information
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\ContentInterface[] $content
     */
    public function __construct(
      $uuid,
      array $available_language_codes,
      $category,
      $status,
      LocationInterface $location = null,
      array $trigger_zones,
      ContentProviderInterface $content_provider,
      PurchaseInterface $purchase = null,
      $duration,
      $distance,
      $placement,
      $visible_on_maps,
      $parent_uuid,
      ScheduleInterface $schedule = null,
      ContactInformationInterface $contact_information = null,
      MapInterface $map = null,
      array $content
    ) {
        parent::__construct($uuid, $available_language_codes, $category,
          $status, $location, $trigger_zones, $content_provider, $purchase,
          $duration, $distance, $placement, $visible_on_maps);
        $this->parentUuid = $parent_uuid;
        $this->schedule = $schedule;
        $this->contactInformation = $contact_information;
        $this->map = $map;
        $this->content = $content;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'purchase' => null,
            'duration' => null,
            'distance' => null,
            'placement' => null,
            'parent_uuid' => null,
            'schedule' => null,
            'contact' => null,
            'map' => null,
            'content' => null,
            'hidden' => null,
            'trigger_zones' => [],
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }

        $location = $data['location'] ? Location::createFromData($data['location']) : null;
        $trigger_zones = [];
        foreach ($data['trigger_zones'] as $trigger_zone_data) {
            $trigger_zones[] = TriggerZone::createFromData($trigger_zone_data);
        }
        $content_provider = $data['content_provider'] ? ContentProvider::createFromData($data['content_provider']) : null;
        $purchase = $data['purchase'] ? Purchase::createFromData($data['purchase']) : null;
        $schedule = $data['schedule'] ? Schedule::createFromData($data['schedule']) : null;
        $contact_information = $data['contact'] ? ContactInformation::createFromData($data['contact']) : null;
        $map = $data['map'] ? Map::createFromData($data['map']) : null;
        $content = [];
        foreach ($data['content'] as $content_data) {
            $content[] = Content::createFromData($content_data);
        }
        return new static($data['uuid'], $data['languages'], $data['category'],
          $data['status'], $location, $trigger_zones, $content_provider,
          $purchase, $data['duration'], $data['distance'], $data['placement'],
          !$data['hidden'], $data['parent_uuid'], $schedule,
          $contact_information, $map, $content);
    }

    public function getParentUuid()
    {
        return $this->parentUuid;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function getContactInformation()
    {
        return $this->contactInformation;
    }

    public function getMap()
    {
        return $this->map;
    }

    public function getContent()
    {
        return $this->content;
    }

}
