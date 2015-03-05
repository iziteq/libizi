<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullCityTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullCity
 */
class FullCityTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullCity|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullCity::createFromJson(TestHelper::getJsonResponse('city_full_include_all'), MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        FullCity::createFromJson(TestHelper::getJsonResponse('city_full_include_all'), MultipleFormInterface::FORM_FULL);
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

        FullCity::createFromJson($json, MultipleFormInterface::FORM_FULL);
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

        FullCity::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CityContentInterface', $content);
        }
    }

}
