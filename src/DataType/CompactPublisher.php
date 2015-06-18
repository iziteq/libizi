<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Defines a compact publisher data type.
 */
class CompactPublisher extends PublisherBase implements CompactPublisherInterface
{

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @var string
     */
    protected $title;

    /**
     * The summary.
     *
     * @var string
     */
    protected $summary;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/publisher_compact_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $publisher */
        $publisher = parent::createBaseFromData($data);
        $publisher->languageCode = $data->language;
        $publisher->title = $data->title;
        $publisher->summary = $data->summary;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $publisher->images[] = Image::createFromData($imageData);
            }
        }

        return $publisher;
    }

    public function getImages()
    {
        return $this->images;
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

}
