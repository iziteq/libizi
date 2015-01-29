<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CityContent.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a city content data type.
 */
class CityContent implements CityContentInterface
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
   * The images.
   *
   * @var \Triquanta\IziTravel\DataType\MediaInterface
   */
  protected $images = [];

  /**
   * Constructs a new instance.
   *
   * @param string $languageCode
   * @param string $title
   * @param string $summary
   * @param string $description
   * @param \Triquanta\IziTravel\DataType\MediaInterface[] $images
   */
  public function __construct($languageCode, $title, $summary, $description, array $images) {
    $this->languageCode = $languageCode;
    $this->title = $title;
    $this->summary = $summary;
    $this->description = $description;
    $this->images = $images;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
        'images' => [],
      ];
    $images = [];
    foreach ($data['images'] as $imageData) {
      $images[] = Media::createFromData($imageData);
    }

    return new static($data['language'], $data['title'], $data['summary'], $data['desc'], $images);
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

  public function getDescription() {
    return $this->description;
  }

  public function getImages() {
    return $this->images;
  }

}
