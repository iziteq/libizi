<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullCountryTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullCountry
 */
class FullCountryTest extends \PHPUnit_Framework_TestCase
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
    "content": [
        {
            "title": "Netherlands",
            "summary": "",
            "desc": "",
            "language": "en"
        }
    ],
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
     * @var \Triquanta\IziTravel\DataType\FullCountry|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullCountry::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        FullCountry::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        FullCountry::createFromJson($json, MultipleFormInterface::FORM_FULL);
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
    "content": [
        {
            "title": "Netherlands",
            "summary": "",
            "desc": "",
            "language": "en"
        }
    ],
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

        FullCountry::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryContentInterface', $content);
        }
    }

}
