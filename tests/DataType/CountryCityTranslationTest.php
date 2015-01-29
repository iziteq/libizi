<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryCityTranslationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryCityTranslation;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryCityTranslation
 */
class CountryCityTranslationTest extends \PHPUnit_Framework_TestCase
{

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
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\CountryCityTranslation
   */
  protected $sut;

  public function setUp()
  {
    $this->name = 'foo_bar_' . mt_rand();
    $this->languageCode = 'uk';

    $this->sut = new CountryCityTranslation($this->name, $this->languageCode);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   * @covers ::createFromData
   */
  public function testCreateFromJson()
  {
    $json = <<<'JSON'
{
  "name": "foo_bar",
  "language":  "UK"
}
JSON;

    CountryCityTranslation::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   * @covers ::createFromData
   *
   * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson()
  {
    $json = 'foo';

    CountryCityTranslation::createFromJson($json);
  }

  /**
   * @covers ::getName
   */
  public function testGetName()
  {
    $this->assertSame($this->name, $this->sut->getName());
  }

  /**
   * @covers ::getLanguageCode
   */
  public function testGetLanguageCode()
  {
    $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
  }

}
