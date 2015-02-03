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

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $type
     * @param int $order
     * @param string|null $url
     * @param string|null $title
     */
    public function __construct($uuid, $type, $order, $url, $title)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->order = $order;
        $this->url = $url;
        $this->title = $title;
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
