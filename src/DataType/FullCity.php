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
  protected $content;

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
   * @param \Triquanta\IziTravel\DataType\CityContentInterface[] $content
   */
  public function __construct($uuid, $revisionHash, $availableLanguageCodes, MapInterface $map = NULL, array $translations, LocationInterface $location = NULL, $status, $numberOfChildren, $visible, array $content) {
    parent::__construct($uuid, $revisionHash, $availableLanguageCodes, $map, $translations, $location, $status, $numberOfChildren, $visible);
    $this->content = $content;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
        'location' => null,
        'map' => null,
        'translations' => [],
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
    $content = [];
    foreach ($data['content'] as $contentData) {
      $content[] = CountryContent::createFromData($contentData);
    }

    return new static($data['uuid'], $data['hash'], $data['languages'], $map, $translations, $location, $data['status'], $data['children_count'], $data['visible'], $content);
  }

  public function getContent() {
    return $this->content;
  }

}
