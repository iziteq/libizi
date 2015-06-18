<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCity.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

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

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/city_compact_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $city */
        $city = parent::createBaseFromData($data);
        $city->languageCode = $data->language;
        $city->title = $data->title;
        $city->summary = $data->summary;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $city->images[] = Image::createFromData($imageData);
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
