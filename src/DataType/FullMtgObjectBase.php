<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full MTG object data type.
 */
abstract class FullMtgObjectBase extends MtgObjectBase implements FullMtgObjectInterface
{

    /**
     * The UUID of the parent object.
     *
     * @var string|null
     */
    protected $parentUuid;

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
    protected $content = [];

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
      array $content
    ) {
        parent::__construct($type, $uuid, $revisionHash, $availableLanguageCodes,
          $status, $location, $triggerZones, $contentProvider, $purchase);
        $this->parentUuid = $parentUuid;
        $this->contactInformation = $contactInformation;
        $this->map = $map;
        $this->content = $content;
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
        return new static($data['type'], $data['uuid'], $data['hash'], $data['languages'],
          $data['status'], $location, $triggerZones, $contentProvider,
          $purchase, $data['parent_uuid'], $contactInformation, $map, $content);
    }

    public function getParentUuid()
    {
        return $this->parentUuid;
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
