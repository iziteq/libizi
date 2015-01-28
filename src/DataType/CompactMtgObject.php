<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactMtgObject.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact MTG object data type.
 */
class CompactMtgObject extends MtgObjectBase implements CompactMtgObjectInterface
{

    use FactoryTrait;

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
     * @return \Triquanta\IziTravel\DataType\MediaInterface[]
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
     * @param string $languageCode
     * @param string|null $route
     * @param string $title
     * @param string $summary ;
     * @param \Triquanta\IziTravel\DataType\MediaInterface[] $images
     * @param int|null $numberOfChildren
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
      $visibleOnMaps,
      $languageCode,
      $route,
      $title,
      $summary,
      array $images,
      $numberOfChildren
    ) {
        parent::__construct($uuid, $availableLanguageCodes, $category,
          $status, $location, $triggerZones, $contentProvider, $purchase,
          $duration, $distance, $placement, $visibleOnMaps);
        $this->languageCode = $languageCode;
        $this->route = $route;
        $this->title = $title;
        $this->summary = $summary;
        $this->images = $images;
        $this->numberOfChildren = $numberOfChildren;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'purchase' => null,
            'duration' => null,
            'distance' => null,
            'placement' => null,
            'hidden' => null,
            'route' => null,
            'children_count' => null,
            'category' => null,
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
            $images[] = Media::createFromData($imageData);
        }
        return new static($data['uuid'], $data['languages'], $data['category'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase, $data['duration'], $data['distance'], $data['placement'],
          !$data['hidden'], $data['language'], $data['route'], $data['title'],
          $data['summary'], $images, $data['children_count']);
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function countChildren()
    {
        return $this->numberOfChildren;
    }

}
