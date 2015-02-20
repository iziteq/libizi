<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MtgObjectInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines an MTG object data type.
 */
interface MtgObjectInterface extends FactoryInterface, MultipleFormInterface, PublishableInterface, RevisionableInterface, TranslatableInterface, UuidInterface
{

    /**
     * A museum.
     */
    const TYPE_MUSEUM = 'museum';

    /**
     * A collection.
     */
    const TYPE_COLLECTION = 'collection';

    /**
     * An exhibit.
     */
    const TYPE_EXHIBIT = 'exhibit';

    /**
     * Story navigation.
     */
    const TYPE_STORY_NAVIGATION = 'story_navigation';

    /**
     * A tour.
     */
    const TYPE_TOUR = 'tour';

    /**
     * A tourist attraction.
     */
    const TYPE_TOURIST_ATTRACTION = 'tourist_attraction';

    /**
     * Gets the data type.
     *
     * @return string
     *   One of the static::TYPE_* constants.
     */
    public function getType();

    /**
     * Gets the location.
     *
     * @return \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    public function getLocation();

    /**
     * Gets the trigger zones.
     *
     * @return \Triquanta\IziTravel\DataType\TriggerZoneInterface[]
     */
    public function getTriggerZones();

    /**
     * Gets the content provider.
     *
     * @return \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    public function getContentProvider();

    /**
     * Gets the purchase.
     *
     * @return \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    public function getPurchase();

}
