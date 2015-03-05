<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCity.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country data type in compact form.
 */
class CompactCity extends CityBase implements CompactCityInterface
{

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
     * @Var string
     */
    protected $title;

    /**
     * The summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $city */
        $city = parent::createBaseFromData($data, $form);
        $city->languageCode = $data->language;
        $city->title = $data->title;
        $city->summary = $data->summary;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $city->images[] = Image::createFromData($imageData, $form);
            }
        }

        return $city;
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

    public function getImages()
    {
        return $this->images;
    }

}
