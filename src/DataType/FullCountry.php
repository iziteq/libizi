<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCountry.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a country data type in full form.
 */
class FullCountry extends CountryBase implements FullCountryInterface
{

    /**
     * The content.
     *
     * @Var \Triquanta\IziTravel\DataType\CountryContentInterface[]
     */
    protected $content = [];

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/country_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $country */
        $country = parent::createBaseFromData($data);
        if (isset($data->content)) {
            foreach ($data->content as $contentData) {
                $country->content[] = CountryContent::createFromData($contentData);
            }
        }

        return $country;
    }

    public function getContent()
    {
        return $this->content;
    }

}
