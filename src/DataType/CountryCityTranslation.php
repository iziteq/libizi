<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CountryCityTranslation.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a country/city translation data type.
 */
class CountryCityTranslation implements  CountryCityTranslationInterface
{

  use FactoryTrait;

  /**
   * The country/city name.
   *
   * @return string
   */
  protected $name;

  /**
   * The language.
   *
   * @return string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $languageCode;

  /**
   * Constructs a new instance.
   *
   * @param string $name
   * @param string $language_code
   */
  public function __construct($name, $language_code) {
    $this->name = $name;
    $this->languageCode = $language_code;
  }

  public static function createFromData($data) {
    $data = (array) $data;

    return new static($data['name'], $data['language']);
  }

  public function getName() {
    return $this->name;
  }

  public function getLanguageCode() {
    return $this->languageCode;
  }

}
