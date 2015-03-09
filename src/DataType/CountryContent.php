<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryContent.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country content data type.
 */
class CountryContent implements CountryContentInterface
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

    public static function createFromData(\stdClass $data)
    {
        $content = new static();
        $content->languageCode = $data->language;
        $content->title = $data->title;
        $content->summary = $data->summary;
        $content->description = $data->desc;

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

}
