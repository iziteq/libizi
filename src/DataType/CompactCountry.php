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

  /**
   * Created a new instance.
   *
   * @param string $uuid
   * @param string $countryCode
   * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
   * @param \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[] $translations
   * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
   * @param string $status
   * @param string $languageCode
   * @param string $title
   * @param string $summary
   */
  public function __construct($uuid, $countryCode, MapInterface $map = NULL, array $translations, LocationInterface $location = NULL, $status, $languageCode, $title, $summary) {
    parent::__construct($uuid, $countryCode, $map, $translations, $location, $status);
    $this->languageCode = $languageCode;
    $this->title = $title;
    $this->summary = $summary;
  }

  public static function createFromData($data) {
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

    return new static($data['uuid'], $data['country_code'], $map, $translations, $location, $data['status'], $data['language'], $data['title'], $data['summary']);
  }

  public function getLanguageCode() {
    return $this->languageCode;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getSummary() {
    return $this->summary;
  }

}
