<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

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

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $publisher */
        $publisher = parent::createBaseFromData($data, $form);
        $publisher->languageCode = $data->language;
        $publisher->title = $data->title;
        $publisher->summary = $data->summary;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $publisher->images[] = Image::createFromData($imageData, $form);
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
