<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an MTG object data type.
 */
abstract class MtgObjectBase implements MtgObjectInterface
{

    use FactoryTrait;
    use PublishableTrait;
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    /**
     * The trigger zones.
     *
     * @var \Triquanta\IziTravel\DataType\TriggerZoneInterface[]
     */
    protected $triggerZones = [];

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    /**
     * The purchase.
     *
     * @var \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    protected $purchase;

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
     */
    public function __construct(
      $uuid,
      $revisionHash,
      array $availableLanguageCodes,
      $status,
      LocationInterface $location = null,
      array $triggerZones,
      ContentProviderInterface $contentProvider,
      PurchaseInterface $purchase = null
    ) {
        $this->uuid = $uuid;
        $this->revisionHash = $revisionHash;
        $this->availableLanguageCodes = $availableLanguageCodes;
        $this->status = $status;
        $this->location = $location;
        $this->triggerZones = $triggerZones;
        $this->contentProvider = $contentProvider;
        $this->purchase = $purchase;
    }

    /**
     * Creates an MTG Object.
     *
     * @param mixed $data
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface
     *
     * @throws \Exception
     */
    public static function createMtgObject($data, $form)
    {
        $data = (array) $data;

        if (!isset($data['type'])) {
            throw new \Exception('MTG Object data must contain a "type" key.');
        }

        /** @var \Triquanta\IziTravel\DataType\MtgObjectInterface $class */
        $class = static::getClassMap()[$data['type']][$form];

        return $class::createFromData($data);
    }

    /**
     * Returns a class map for the different object types.
     *
     * @return array[]
     *   Keys are static::TYPE_* constants. Values are arrays of which the keys
     *   are \Triquanta\IziTravel\DataType\MultipleFormInterface;:FORM_*
     *   constants and values are fully qualified class names.
     *
     */
    public static function getClassMap()
    {
        return [
          static::TYPE_MUSEUM => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullMuseum',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactMuseum',
          ],
          static::TYPE_TOUR => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullTour',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactTour',
          ],
          static::TYPE_EXHIBIT => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullExhibit',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactExhibit',
          ],
          static::TYPE_COLLECTION => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullCollection',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactCollection',
          ],
          static::TYPE_STORY_NAVIGATION => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullStoryNavigation',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactStoryNavigation',
          ],
          static::TYPE_TOURIST_ATTRACTION => [
            MultipleFormInterface::FORM_FULL => '\Triquanta\IziTravel\DataType\FullTouristAttraction',
            MultipleFormInterface::FORM_COMPACT => '\Triquanta\IziTravel\DataType\CompactTouristAttraction',
          ],
        ];
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getTriggerZones()
    {
        return $this->triggerZones;
    }

    public function getContentProvider()
    {
        return $this->contentProvider;
    }

    public function getPurchase()
    {
        return $this->purchase;
    }

}
