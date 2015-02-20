<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full tourist attraction data type.
 */
class FullTouristAttraction extends FullMtgObjectBase implements FullTouristAttractionInterface
{

    use TouristAttractionTrait;

    /**
     * Creates a new instance.
     *
     * @param string $type
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
     * @param bool $hidden
     */
    public function __construct(
      $type,
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
      $hidden
    ) {
        parent::__construct($type, $uuid, $revisionHash,
          $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $parentUuid, $contactInformation, $map, $content);
        $this->hidden = $hidden;
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
        $contactInformation = $data['contact'] ? ContactInformation::createFromData($data['contact']) : null;
        $map = $data['map'] ? Map::createFromData($data['map']) : null;
        $content = [];
        foreach ($data['content'] as $contentData) {
            $content[] = Content::createFromData($contentData);
        }
        return new static($data['type'], $data['uuid'], $data['hash'],
          $data['languages'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase,
          $data['parent_uuid'], $contactInformation, $map, $content,
          $data['hidden']);
    }

}
