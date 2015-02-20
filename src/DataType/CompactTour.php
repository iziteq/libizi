<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactTour.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact tour data type.
 */
class CompactTour extends CompactMtgObjectBase implements CompactTourInterface
{

    use TourTrait;

    /**
     * The route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    /**
     * Creates a new instance.
     *
     * @param string $type
     * @oaram string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param \Triquanta\IziTravel\DataType\TriggerZoneInterface[] $triggerZones
     * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $contentProvider
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface|null $purchase
     * @param string $languageCode
     * @param string $title
     * @param string $summary
     * @param \Triquanta\IziTravel\DataType\ImageInterface[] $images
     * @param int|null $numberOfChildren
     * @param string $category
     * @param int $duration
     * @param int $distance
     * @param string $placement
     * @param string|null $route
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
      $category,
      $duration,
      $distance,
      $placement,
      $route
    ) {
        parent::__construct($type, $uuid, $revisionHash,
          $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $languageCode, $title, $summary, $images, $numberOfChildren,
          $category, $duration, $distance, $placement);
        $this->route = $route;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'purchase' => null,
            'route' => null,
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
        return new static($data['type'], $data['uuid'], $data['hash'],
          $data['languages'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase,
          $data['language'], $data['title'],
          $data['summary'], $images, $data['children_count'], $data['category'],
          $data['duration'], $data['distance'], $data['placement'],
          $data['route']);
    }

    public function getRoute()
    {
        return $this->route;
    }

}
