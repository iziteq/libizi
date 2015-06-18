<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MediaBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a media data type.
 */
abstract class MediaBase implements MediaInterface
{

    use FactoryTrait;
    use RevisionableTrait;
    use UuidTrait;

    /**
     * The type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

    /**
     * The order.
     *
     * @var int
     */
    protected $order;

    /**
     * The URL.
     *
     * @var string|null
     */
    protected $url;

    /**
     * The title.
     *
     * @var string|null
     */
    protected $title;

    public static function createFromData(\stdClass $data)
    {
        $media = new static();
        $media->uuid = $data->uuid;
        $media->type = $data->type;
        $media->order = $data->order;
        if (isset($data->url)) {
            $media->url = $data->url;
        }
        if (isset($data->title)) {
            $media->title = $data->title;
        }

        return $media;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
