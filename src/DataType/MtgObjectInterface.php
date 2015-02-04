<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MtgObjectInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines an MTG object data type.
 */
interface MtgObjectInterface extends FactoryInterface, MultipleFormInterface, RevisionableInterface, TranslatableInterface, UuidInterface
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
     * A published object.
     */
    const STATUS_PUBLISHED = 'published';

    /**
     * A non-public/limited object.
     */
    const STATUS_LIMITED = 'limited';

    /**
     * Gets whether the object is published.
     *
     * @return bool
     */
    public function isPublished();

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
