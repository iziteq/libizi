<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CityContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CityContent;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CityContent
 */
class CityContentTest extends \PHPUnit_Framework_TestCase
{

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
   * @var \Triquanta\IziTravel\DataType\ImageInterface[]
   */
  protected $images = [];

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\CityContent
   */
  protected $sut;

  public function setUp()
  {
    $this->languageCode = 'uk';

    $this->title= 'Foo & Bar ' . mt_rand();

    $this->summary = 'The story of Foo & Bar ' . mt_rand();

    $this->description = 'A description of the story of Foo & Bar ' . mt_rand();

    $this->images = [
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
    ];

    $this->sut = new CityContent($this->languageCode, $this->title, $this->summary, $this->description, $this->images);
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
    "title": "Amsterdam",
    "summary": "",
    "desc": "",
    "language": "en",
    "images": [
        {
            "uuid": "3f879f37-21b0-479d-bd74-aa26f72fa328",
            "type": "city",
            "order": 1
        }
    ]
}
JSON;

    CityContent::createFromJson($json);
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

    CityContent::createFromJson($json);
  }

  /**
   * @covers ::getLanguageCode
   */
  public function testGetLanguageCode()
  {
    $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
  }

  /**
   * @covers ::getTitle
   */
  public function testGetTitle()
  {
    $this->assertSame($this->title, $this->sut->getTitle());
  }

  /**
   * @covers ::getSummary
   */
  public function testGetSummary()
  {
    $this->assertSame($this->summary, $this->sut->getSummary());
  }

  /**
   * @covers ::getDescription
   */
  public function testGetDescription()
  {
    $this->assertSame($this->description, $this->sut->getDescription());
  }

  /**
   * @covers ::getImages
   */
  public function testGetImages()
  {
    $this->assertSame($this->images, $this->sut->getImages());
  }

}
