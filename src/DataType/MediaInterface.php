<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MediaInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a media data type.
 */
interface MediaInterface extends FactoryInterface, RevisionableInterface, UuidInterface
{

    /**
     * A brand cover media item.
     */
    const TYPE_BRAND_COVER = 'brand_cover';

    /**
     * A brand logo media item.
     */
    const TYPE_BRAND_LOGO = 'brand_logo';

    /**
     * A brand logo media item.
     */
    const TYPE_SPONSOR_LOGO = 'sponsor_logo';

    /**
     * A map media item.
     */
    const TYPE_MAP = 'map';

    /**
     * A story media item.
     */
    const TYPE_STORY = 'story';

    /**
     * Image media.
     */
    const MEDIA_IMAGE = 'images';

    /**
     * Video media.
     */
    const MEDIA_VIDEO = 'video';

    /**
     * Audio media.
     */
    const MEDIA_AUDIO = 'audio';

    /**
     * Gets the type.
     *
     * @return string
     *   One of the static::TYPE_* constants.
     */
    public function getType();

    /**
     * Gets the order.
     *
     * @return int
     */
    public function getOrder();

    /**
     * Gets the URL.
     *
     * @return string|null
     */
    public function getUrl();

    /**
     * Gets the title.
     *
     * @return string|null
     */
    public function getTitle();

}
