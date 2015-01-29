<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\PublisherContent;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherContent
 */
class PublisherContentTest extends \PHPUnit_Framework_TestCase
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
   * @var \Triquanta\IziTravel\DataType\MediaInterface[]
   */
  protected $images = [];

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\PublisherContent
   */
  protected $sut;

  public function setUp()
  {
    $this->languageCode = 'uk';

    $this->title= 'Foo & Bar ' . mt_rand();

    $this->summary = 'The story of Foo & Bar ' . mt_rand();

    $this->description = 'A description of the story of Foo & Bar ' . mt_rand();

    $this->images = [
      $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
    ];

    $this->sut = new PublisherContent($this->languageCode, $this->images, $this->title, $this->summary, $this->description);
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
    "title": "Amsterdam Museum",
    "summary": "Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen. ",
    "desc": "Het Amsterdam Museum vertelt het verhaal van de ......",
    "language": "en",
    "images": [
        {
            "uuid": "95e14c61-d879-456e-9085-47d5274c5d1d",
            "type": "brand_logo",
            "order": 1,
            "hash": "baae2a048f560756a55f54f9d6bc58c8",
            "size": 52621
        },
        {
            "uuid": "57deeecb-c5b0-4a8f-b561-7589ceb5c47b",
            "type": "brand_cover",
            "order": 1
        }
    ]
}
JSON;

    PublisherContent::createFromJson($json);
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

    PublisherContent::createFromJson($json);
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
