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
     * @param string $revisionHash
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
     * @param string $parentUuid
     * @param \Triquanta\IziTravel\DataType\ScheduleInterface|null $schedule
     * @param \Triquanta\IziTravel\DataType\ContactInformationInterface|null $contactInformation
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\ContentInterface[] $content
     */
    public function __construct(
      $uuid,
      $revisionHash,
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
      $visibleOnMaps,
      $parentUuid,
      ScheduleInterface $schedule = null,
      ContactInformationInterface $contactInformation = null,
      MapInterface $map = null,
      array $content
    ) {
        parent::__construct($uuid, $revisionHash, $availableLanguageCodes, $category,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $duration, $distance, $placement, $visibleOnMaps);
        $this->parentUuid = $parentUuid;
        $this->schedule = $schedule;
        $this->contactInformation = $contactInformation;
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
        $triggerZones = [];
        foreach ($data['trigger_zones'] as $triggerZoneData) {
            $triggerZones[] = TriggerZone::createFromData($triggerZoneData);
        }
        $contentProvider = $data['content_provider'] ? ContentProvider::createFromData($data['content_provider']) : null;
        $purchase = $data['purchase'] ? Purchase::createFromData($data['purchase']) : null;
        $schedule = $data['schedule'] ? Schedule::createFromData($data['schedule']) : null;
        $contactInformation = $data['contact'] ? ContactInformation::createFromData($data['contact']) : null;
        $map = $data['map'] ? Map::createFromData($data['map']) : null;
        $content = [];
        foreach ($data['content'] as $contentData) {
            $content[] = Content::createFromData($contentData);
        }
        return new static($data['uuid'], $data['hash'], $data['languages'], $data['category'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase, $data['duration'], $data['distance'], $data['placement'],
          !$data['hidden'], $data['parent_uuid'], $schedule,
          $contactInformation, $map, $content);
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
