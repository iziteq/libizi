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
     * The data type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

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

    protected static function createBaseFromData(\stdClass $data, $form)
    {
        if (!isset($data->uuid)) {
            throw new MissingUuidFactoryException($data);
        }

        $object = new static();
        $object->type = $data->type;
        $object->uuid = $data->uuid;
        $object->revisionHash = $data->hash;
        $object->availableLanguageCodes = $data->languages;
        $object->status = $data->status;
        $object->contentProvider = ContentProvider::createFromData($data->content_provider, $form);
        if (isset($data->location)) {
            $object->location = Location::createFromData($data->location, $form);
        }
        if (isset($data->trigger_zones)) {
            foreach ($data->trigger_zones as $triggerZoneData) {
                $object->triggerZones[] = TriggerZone::createFromData($triggerZoneData, $form);
            }
        }
        if (isset($data->purchase)) {
            $object->purchase = Purchase::createFromData($data->purchase, $form);
        }

        return $object;
    }

    public static function createFromData(\stdClass $data, $form)
    {
        if (!isset($data->type)) {
            throw new \Exception('MTG Object data must contain a "type" key.');
        }

        /** @var \Triquanta\IziTravel\DataType\MtgObjectInterface $class */
        $class = static::getClassMap()[$data->type][$form];

        return $class::createFromData($data, $form);
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

    public function getType()
    {
        return $this->type;
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
