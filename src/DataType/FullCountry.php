<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCountry.
 */

namespace Triquanta\IziTravel\DataType;

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

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $country */
        $country = parent::createBaseFromData($data, $form);
        if (isset($data->content)) {
            foreach ($data->content as $contentData) {
                $country->content[] = CountryContent::createFromData($contentData, $form);
            }
        }

        return $country;
    }

    public function getContent()
    {
        return $this->content;
    }

}
