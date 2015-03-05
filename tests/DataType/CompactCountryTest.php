<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactCountryTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CountryInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactCountry
 */
class CompactCountryTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
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
  "summary": "De gekste!",
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

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactCountry|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactCountry::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        CompactCountry::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactCountry::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
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

        CompactCountry::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('nl', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame('Nederland', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('De gekste!', $this->sut->getSummary());
    }

}
