<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact MTG object data type.
 */
abstract class CompactMtgObjectBase extends MtgObjectBase implements CompactMtgObjectInterface
{

    /**
     * The language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

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
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
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
      $numberOfChildren
    ) {
        parent::__construct($type, $uuid, $revisionHash,
          $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase);
        $this->languageCode = $languageCode;
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
          $data['summary'], $images, $data['children_count']);
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
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
