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

    /**
     * Constructs a new instance.
     *
     * @param string $languageCode
     * @param string $title
     * @param string $summary
     * @param string $description
     */
    public function __construct($languageCode, $title, $summary, $description)
    {
        $this->languageCode = $languageCode;
        $this->title = $title;
        $this->summary = $summary;
        $this->description = $description;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;

        return new static($data['language'], $data['title'], $data['summary'],
          $data['desc']);
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
