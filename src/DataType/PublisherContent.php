<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContent.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher content data type.
 */
class PublisherContent implements PublisherContentInterface
{
  use FactoryTrait;

  /**
   * The language.
   *
   * @var string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $languageCode;

  /**
   * The images.
   *
   * @var \Triquanta\IziTravel\DataType\ImageInterface[]
   */
  protected $images = [];

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
   * @param \Triquanta\IziTravel\DataType\ImageInterface[] $images
   * @param string $title
   * @param string $summary
   * @param string $description
   */
  public function __construct($languageCode, array $images, $title, $summary, $description) {
    $this->languageCode = $languageCode;
    $this->images = $images;
    $this->title = $title;
    $this->summary = $summary;
    $this->description = $description;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
      'images' => [],
    ];

    $images = [];
    foreach ($data['images'] as $imageData) {
      $images[] = Image::createFromData($imageData);
    }

    return new static($data['language'], $images, $data['title'], $data['summary'], $data['desc']);
  }

  public function getLanguageCode() {
    return $this->languageCode;
  }

  public function getImages() {
    return $this->images;
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

}
