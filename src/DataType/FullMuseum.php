<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMuseum.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full museum data type.
 */
class FullMuseum extends FullMtgObjectBase implements FullMuseumInterface
{

    /**
     * The schedule.
     *
     * @var \Triquanta\IziTravel\DataType\ScheduleInterface|null
     */
    protected $schedule;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param \Triquanta\IziTravel\DataType\TriggerZoneInterface[] $triggerZones
     * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $contentProvider
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface|null $purchase
     * @param string $parentUuid
     * @param \Triquanta\IziTravel\DataType\ContactInformationInterface|null $contactInformation
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\ContentInterface[] $content
     * @param \Triquanta\IziTravel\DataType\ScheduleInterface|null $schedule
     */
    public function __construct(
      $uuid,
      $revisionHash,
      array $availableLanguageCodes,
      $status,
      LocationInterface $location = null,
      array $triggerZones,
      ContentProviderInterface $contentProvider,
      PurchaseInterface $purchase = null,
      $parentUuid,
      ContactInformationInterface $contactInformation = null,
      MapInterface $map = null,
      array $content,
      ScheduleInterface $schedule = null
    ) {
        parent::__construct($uuid, $revisionHash, $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $parentUuid, $contactInformation, $map, $content);
        $this->schedule = $schedule;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'purchase' => null,
            'parent_uuid' => null,
            'contact' => null,
            'map' => null,
            'content' => null,
            'trigger_zones' => [],
            'schedule' => null,
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
        $contactInformation = $data['contact'] ? ContactInformation::createFromData($data['contact']) : null;
        $map = $data['map'] ? Map::createFromData($data['map']) : null;
        $content = [];
        foreach ($data['content'] as $contentData) {
            $content[] = Content::createFromData($contentData);
        }
        $schedule = $data['schedule'] ? Schedule::createFromData($data['schedule']) : null;
        return new static($data['uuid'], $data['hash'], $data['languages'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase, $data['parent_uuid'],
          $contactInformation, $map, $content, $schedule);
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

}
