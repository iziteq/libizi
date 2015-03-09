<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContent.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher content data type.
 */
class PublisherContent implements PublisherContentInterface
{
    use FactoryTrait;

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

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

    /**
     * The description.
     *
     * @var string
     */
    protected $description;

    public static function createFromData(\stdClass $data)
    {
        $content = new static();
        $content->languageCode = $data->language;
        $content->title = $data->title;
        $content->summary = $data->summary;
        $content->description = $data->desc;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $content->images[] = Image::createFromData($imageData);
            }
        }

        return $content;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getDescription()
    {
        return $this->description;
    }

}
