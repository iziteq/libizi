<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTouristAttraction.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact tourist attraction data type.
 */
class CompactTouristAttraction extends CompactMtgObjectBase implements CompactTouristAttractionInterface
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
     * @param string $languageCode
     * @param string $title
     * @param string $summary ;
     * @param \Triquanta\IziTravel\DataType\ImageInterface[] $images
     * @param int|null $numberOfChildren
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
      $languageCode,
      $title,
      $summary,
      array $images,
      $numberOfChildren,
      $hidden
    ) {
        parent::__construct($type, $uuid, $revisionHash, $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $languageCode, $title, $summary, $images, $numberOfChildren);
        $this->hidden = $hidden;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'purchase' => null,
            'hidden' => null,
            'children_count' => null,
            'trigger_zones' => [],
            'images' => [],
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
        $images = [];
        foreach ($data['images'] as $imageData) {
            $images[] = Image::createFromData($imageData);
        }
        return new static($data['type'], $data['uuid'], $data['hash'], $data['languages'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase,
          $data['language'], $data['title'],
          $data['summary'], $images, $data['children_count'], $data['hidden']);
    }

}
