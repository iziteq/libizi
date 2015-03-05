<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactCityTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactCity
 */
class CompactCityTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid": "3f879f37-21b0-479d-bd74-aa26f72fa328",
  "type": "city",
  "languages": [
      "nl",
      "de",
      "en",
      "ru",
      "it",
      "es",
      "fr",
      "ja"
  ],
  "status": "published",
  "children_count": 13,
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
      },
      {
          "name": "Amsterdam",
          "language": "it"
      },
      {
          "name": "Амстердам",
          "language": "ru"
      },
      {
          "name": "Amsterdam",
          "language": "de"
      },
      {
          "name": "阿姆斯特丹",
          "language": "zh"
      },
      {
          "name": "Amsterdam",
          "language": "fr"
      },
      {
          "name": "Amsterdam",
          "language": "nl"
      },
      {
          "name": "Ámsterdam",
          "language": "es"
      },
      {
          "name": "Amsterdam",
          "language": "sv"
      }
  ],
  "map": {
      "bounds": "52.3182742,4.7288558,52.4311573,5.0683775"
  },
  "hash": "68ad379344ed90799b8171f0acda9f62180d9905",
  "visible": true,
  "title": "Amsterdam",
  "summary": "Damsko, jeweet.",
  "language": "en",
  "images": [
        {
            "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
            "type" : "story",
            "order" : 1,
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "size" : 231663
        }
  ],
  "location": {
      "altitude": 0,
      "latitude": 52.3702157,
      "longitude": 4.8951679,
      "country_code": "nl",
      "country_uuid": "15845ecf-4274-4286-b086-e407ff8207de"
  }
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactCity|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactCity::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
     */
    public function testCreateFromJson()
    {

        CompactCity::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactCity::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
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

        CompactCity::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('en', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame('Amsterdam', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('Damsko, jeweet.', $this->sut->getSummary());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ImageInterface', $image);
        }
    }

}
