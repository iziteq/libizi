<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a compact publisher data type.
 */
class CompactPublisher extends PublisherBase implements CompactPublisherInterface
{

  /**
   * The images.
   *
   * @var \Triquanta\IziTravel\DataType\ImageInterface[]
   */
  protected $images = [];

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
   * Constructs a new instance.
   *
   * @param string $uuid
   * @param string $revisionHash
   * @param string[] $availableLanguageCodes
   * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $contentProvider
   * @param string $status
   * @param string $languageCode
   * @param string $title
   * @param string $summary
   * @param \Triquanta\IziTravel\DataType\ImageInterface[] $images
   */
  public function __construct($uuid, $revisionHash, array $availableLanguageCodes, ContentProviderInterface $contentProvider, $status, $languageCode, $title, $summary, array $images) {
    parent::__construct($uuid, $revisionHash, $availableLanguageCodes, $contentProvider, $status);
    $this->images = $images;
    $this->languageCode = $languageCode;
    $this->title = $title;
    $this->summary = $summary;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
      'images' => [],
    ];
    if (!isset($data['uuid'])) {
      throw new MissingUuidFactoryException($data);
    }

    $contentProvider = ContentProvider::createFromData($data['content_provider']);
    $images = [];
    foreach ($data['images'] as $imageData) {
      $images[] = Image::createFromData($imageData);
    }

    return new static($data['uuid'], $data['hash'], $data['languages'], $contentProvider, $data['status'], $data['language'], $data['title'], $data['summary'], $images);
  }

  public function getImages() {
    return $this->images;
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
