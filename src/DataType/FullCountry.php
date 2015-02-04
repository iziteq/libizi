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

    /**
     * Created a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param string $countryCode
     * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
     * @param \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[] $translations
     * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\CountryContentInterface[] $content
     */
    public function __construct(
      $uuid,
      $revisionHash,
      $availableLanguageCodes,
      $countryCode,
      MapInterface $map = null,
      array $translations,
      LocationInterface $location = null,
      $status,
      array $content
    ) {
        parent::__construct($uuid, $revisionHash, $availableLanguageCodes,
          $countryCode, $map, $translations, $location, $status);
        $this->content = $content;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'location' => null,
            'map' => null,
            'translations' => [],
            'country_code' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        $location = $data['location'] ? Location::createFromData($data['location']) : null;
        $map = $data['location'] ? Map::createFromData($data['map']) : null;
        $translations = [];
        foreach ($data['translations'] as $translationData) {
            $translations[] = CountryCityTranslation::createFromData($translationData);
        }
        $content = [];
        foreach ($data['content'] as $contentData) {
            $content[] = CountryContent::createFromData($contentData);
        }

        return new static($data['uuid'], $data['hash'], $data['languages'],
          $data['country_code'], $map, $translations, $location,
          $data['status'], $content);
    }

    public function getContent()
    {
        return $this->content;
    }

}
