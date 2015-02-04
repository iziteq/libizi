<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactCountryTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CountryInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactCountry
 */
class CompactCountryTest extends \PHPUnit_Framework_TestCase
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
     * The country code.
     *
     * @var string|null
     *   An ISO 3166-1 alpha-2 country code.
     */
    protected $countryCode;

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The map.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $map;

    /**
     * The translations.
     *
     * @var \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[]
     */
    protected $translations = [];

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * The title.
     *
     * @Var string
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
     * @var \Triquanta\IziTravel\DataType\CompactCountry|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'hwg98309t82ohtwqlekhgf0823yt';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->countryCode = 'UA';

        $this->languageCode = 'uk';

        $this->map = $this->getMock('\Triquanta\IziTravel\DataType\MapInterface');

        $this->translations = [
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
        ];

        $this->status = CountryInterface::STATUS_PUBLISHED;

        $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

        $this->title = 'Foo & Bar ' . mt_rand();

        $this->summary = 'A story about Foo & Bar ' . mt_rand();

        $this->sut = new CompactCountry(
          $this->uuid,
          $this->revisionHash,
          $this->availableLanguageCodes,
          $this->countryCode,
          $this->map,
          $this->translations,
          $this->location,
          $this->status,
          $this->languageCode,
          $this->title,
          $this->summary
        );
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
  "uuid": "15845ecf-4274-4286-b086-e407ff8207de",
  "type": "country",
  "languages": [
      "nl",
      "de",
      "en",
      "fr",
      "es",
      "it",
      "ru",
      "ja"
  ],
  "status": "published",
  "map": {
      "bounds": "50.7503838,3.357962,53.5560213,7.2275102"
  },
  "hash": "625fa5ae924390fdc162e25d704549f83ec2dac8",
  "country_code": "nl",
  "title": "Nederland",
  "summary": "",
  "language": "nl",
  "location": {
      "altitude": 0,
      "latitude": 52.132633,
      "longitude": 5.291266
  },
  "translations": [
            {
                "name": "Amsterdam",
                "language": "en"
            },
            {
                "name": "Amesterdão",
                "language": "pt"
            },
            {
                "name": "Amsterdam",
                "language": "ro"
            }
        ]
}
JSON;

        CompactCountry::createFromJson($json);
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

        CompactCountry::createFromJson($json);
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
  "type": "country",
  "languages": [
      "nl",
      "de",
      "en",
      "fr",
      "es",
      "it",
      "ru",
      "ja"
  ],
  "status": "published",
  "map": {
      "bounds": "50.7503838,3.357962,53.5560213,7.2275102"
  },
  "hash": "625fa5ae924390fdc162e25d704549f83ec2dac8",
  "country_code": "nl",
  "title": "Nederland",
  "summary": "",
  "language": "nl",
  "location": {
      "altitude": 0,
      "latitude": 52.132633,
      "longitude": 5.291266
  },
  "translations": [
            {
                "name": "Amsterdam",
                "language": "en"
            },
            {
                "name": "Amesterdão",
                "language": "pt"
            },
            {
                "name": "Amsterdam",
                "language": "ro"
            }
        ]
}
JSON;

        CompactCountry::createFromJson($json);
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
