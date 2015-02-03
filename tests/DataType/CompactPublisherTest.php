<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\PublisherInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactPublisher
 */
class CompactPublisherTest extends \PHPUnit_Framework_TestCase
{

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The revision hash.
   *
   * @var string
   */
  protected $revisionHash;

  /**
   * The language codes for available translations.
   *
   * @var string[]
   *   Values are ISO 639-1 alpha-2 language codes.
   */
  protected $availableLanguageCodes = [];

  /**
   * The status.
   *
   * @var string
   */
  protected $status;

  /**
   * The content provider.
   *
   * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
   */
  protected $contentProvider;

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
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\CompactPublisher
   */
  protected $sut;

  public function setUp()
  {
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->revisionHash = 'hgo82ut097q398yquwfwhi4jt';

    $this->availableLanguageCodes = ['nl', 'uk'];

    $this->status = PublisherInterface::STATUS_PUBLISHED;

    $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

    $this->images = [
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
    ];

    $this->languageCode = 'nl';

    $this->title = 'Foo & Bar ' . mt_rand();

    $this->summary = 'The story of Foo & Bar ' . mt_rand();

    $this->sut = new CompactPublisher($this->uuid, $this->revisionHash, $this->availableLanguageCodes, $this->contentProvider, $this->status, $this->languageCode, $this->title, $this->summary, $this->images);
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
    "uuid": "7d84ef00-f4f6-4b90-89d7-f20207ee9ca6",
    "type": "publisher",
    "languages": [
        "en"
    ],
    "status": "published",
    "hash": "e8ce336bc687892e6b1a98cb9f7d1254128a17a6",
    "title": "Amsterdam Museum",
    "summary": "Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen. ",
    "language": "en",
    "images": [
        {
            "uuid": "95e14c61-d879-456e-9085-47d5274c5d1d",
            "type": "brand_logo",
            "order": 1,
            "hash": "baae2a048f560756a55f54f9d6bc58c8",
            "size": 52621
        }
    ],
    "content_provider": {
        "uuid": "d75cdc77-2376-4e9d-b62f-0338861420c0",
        "name": "Amsterdam Museum",
        "copyright": "Amsterdam Museum"
    }
}
JSON;

    CompactPublisher::createFromJson($json);
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

    CompactPublisher::createFromJson($json);
  }

  /**
   * @covers ::createFromJson
   * @covers ::createFromData
   *
   * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
   */
  public function testCreateFromJsonWithoutUuid()
  {
    $json = <<<'JSON'
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

    CompactPublisher::createFromJson($json);
  }

  /**
   * @covers ::getImages
   */
  public function testGetImages()
  {
    $this->assertSame($this->images, $this->sut->getImages());
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

}
