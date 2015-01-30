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
     * A museum collection.
     */
    const TYPE_MUSEUM_COLLECTION = 'collection';

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
     * A walking tour.
     */
    const CATEGORY_WALK = 'walk';

    /**
     * A biking tour.
     */
    const CATEGORY_BIKE = 'bike';

    /**
     * A bus tour.
     */
    const CATEGORY_BUS = 'bus';

    /**
     * A tour by car.
     */
    const CATEGORY_CAR = 'car';

    /**
     * A tour by boat.
     */
    const CATEGORY_BOAT = 'boat';

    /**
     * A published object.
     */
    const STATUS_PUBLISHED = 'published';

    /**
     * A non-public/limited object.
     */
    const STATUS_LIMITED = 'limited';

    /**
     * An indoor object.
     */
    const PLACEMENT_INDOOR = 'indoor';

    /**
     * A outdoor object.
     */
    const PLACEMENT_OUTDOOR = 'outdoor';

    /**
     * Gets the category.
     *
     * @return string
     *   One of the static::CATEGORY_* constants.
     */
    public function getCategory();

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

    /**
     * Gets the duration.
     *
     * @return int|null
     *   The duration in seconds.
     */
    public function getDuration();

    /**
     * Gets the distance.
     *
     * @return int|null
     *   The distance in meters.
     */
    public function getDistance();

    /**
     * Gets the placement.
     *
     * @return string|null
     *   One of the static::PLACEMENT_* constants.
     */
    public function getPlacement();

    /**
     * Returns whether the object must be visible on maps.
     *
     * @return bool
     */
    public function isVisibleOnMaps();

}
