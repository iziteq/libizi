<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CityContent.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a city content data type.
 */
class CityContent implements CityContentInterface
{

    use FactoryTrait;

    /**
     * The language code.
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

    /**
     * The description.
     *
     * @var string
     */
    protected $description;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface
     */
    protected $images = [];

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

    public function getImages()
    {
        return $this->images;
    }

}
