<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCity.
 */

namespace Triquanta\IziTravel\DataType;

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

  /**
   * Created a new instance.
   *
   * @param string $uuid
   * @param string $revisionHash
   * @param string[] $availableLanguageCodes
   * @param \Triquanta\IziTravel\DataType\MapInterface|null $map
   * @param \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[] $translations
   * @param \Triquanta\IziTravel\DataType\LocationInterface|null $location
   * @param string $status
   * @param int|null $numberOfChildren
   * @param bool $visible
   * @param string $languageCode
   * @param string $title
   * @param string $summary
   * @param \Triquanta\IziTravel\DataType\ImageInterface[] $images
   */
  public function __construct($uuid, $revisionHash, array $availableLanguageCodes, MapInterface $map = NULL, array $translations, LocationInterface $location = NULL, $status, $numberOfChildren, $visible, $languageCode, $title, $summary, array $images) {
    parent::__construct($uuid, $revisionHash, $availableLanguageCodes, $map, $translations, $location, $status, $numberOfChildren, $visible);
    $this->languageCode = $languageCode;
    $this->title = $title;
    $this->summary = $summary;
    $this->images = $images;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
        'location' => null,
        'map' => null,
        'translations' => [],
        'images' => [],
        'children_count' => null,
      ];
    if (!isset($data['uuid'])) {
      throw new MissingUuidFactoryException($data);
    }
    $location = $data['location'] ? Location::createFromData($data['location']) : null;
    $map = $data['map'] ? Map::createFromData($data['map']) : null;
    $translations = [];
    foreach ($data['translations'] as $translationData) {
      $translations[] = CountryCityTranslation::createFromData($translationData);
    }
    $images = [];
    foreach ($data['images'] as $imageData) {
      $images[] = Image::createFromData($imageData);
    }

    return new static($data['uuid'], $data['hash'], $data['languages'], $map, $translations, $location, $data['status'], $data['children_count'], $data['visible'], $data['language'], $data['title'], $data['summary'], $images);
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

  public function getImages() {
    return $this->images;
  }

}
