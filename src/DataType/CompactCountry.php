<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCountry.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country data type in compact form.
 */
class CompactCountry extends CountryBase implements CompactCountryInterface
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

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $country */
        $country = parent::createBaseFromData($data, $form);
        $country->languageCode = $data->language;
        $country->title = $data->title;
        $country->summary = $data->summary;

        return $country;
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
