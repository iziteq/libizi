<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a featured MTG Object.
 */
abstract class FeaturedMtgObjectBase extends FeaturedContentBase implements FeaturedMtgObjectInterface
{

  use TranslatableTrait;

  /**
   * The UUID of the city this content belongs to.
   *
   * @var string|null
   */
  protected $cityUuid;

  /**
   * The UUID of the country this content belongs to.
   *
   * @var string|null
   */
  protected $countryUuid;

  /**
   * Constructs a new instance.
   *
   * @param string $uuid
   * @param string $status
   *   One of the \Triquanta\IziTravel|DataType\PublishableInterface::STATUS_*
   *   constants.
   * @param bool $promoted
   * @param string $requestedLanguageCode
   *   An ISO 639-1 alpha-2 language code.
   * @param string $languageCode
   *   An ISO 639-1 alpha-2 language code.
   * @param string $name
   * @param string $description
   * @param int|null $position
   * @param \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[] $images
   * @param string|null $cityUuid
   * @param string|null $countryUuid
   */
  public function __construct($uuid, $status, $promoted, $requestedLanguageCode, $languageCode, $name, $description, $position, array $images, $cityUuid, $countryUuid)
  {
    parent::__construct($uuid, $status, $promoted, $requestedLanguageCode, $languageCode, $name, $description, $position, $images);
    $this->cityUuid = $cityUuid;
    $this->countryUuid = $countryUuid;
  }

  public static function createFromData($data) {
    $data = (array) $data + [
        'content_languages' => [],
        'country_uuid' => null,
        'city_uuid' => null,
        'description' => null,
        'images' => [],
        'name' => null,
        'position' => null,
      ];
    if (!isset($data['uuid'])) {
      throw new MissingUuidFactoryException($data);
    }

    $images = [];
    foreach ($data['images'] as $imageData) {
      $images[] = FeaturedContentImage::createFromData($imageData);
    }

    return new static($data['uuid'], $data['status'], $data['promoted'], $data['language'], $data['content_language'], $data['name'], $data['description'], $data['position'], $images, $data['city_uuid'], $data['country_uuid']);
  }

  public function getCityUuid() {
    return $this->cityUuid;
  }

  public function getCountryUuid() {
    return $this->countryUuid;
  }

}
