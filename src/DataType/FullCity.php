<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCity.
 */

namespace Triquanta\IziTravel\DataType;

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

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $city */
        $city = parent::createBaseFromData($data, $form);
        if (isset($data->content)) {
            $content = [];
            foreach ($data->content as $contentData) {
                $content[] = CityContent::createFromData($contentData, $form);
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
