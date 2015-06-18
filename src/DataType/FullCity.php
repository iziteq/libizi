<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCity.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a country data type in full form.
 */
class FullCity extends CityBase implements FullCityInterface
{

    /**
     * The content.
     *
     * @Var \Triquanta\IziTravel\DataType\CityContentInterface[]
     */
    protected $content = [];

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/city_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $city */
        $city = parent::createBaseFromData($data);
        if (isset($data->content)) {
            $content = [];
            foreach ($data->content as $contentData) {
                $content[] = CityContent::createFromData($contentData);
            }
            $city->content = $content;
        }

        return $city;
    }

    public function getContent()
    {
        return $this->content;
    }

}
