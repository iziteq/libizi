<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryBase
 */
class CountryBaseTest extends \PHPUnit_Framework_TestCase
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
     * @var \Triquanta\IziTravel\DataType\CountryBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CountryBase');
        /** @var \Triquanta\IziTravel\DataType\CountryBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromData()
    {
        /** @var \Triquanta\IziTravel\DataType\CountryBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame('nl', $this->sut->getCountryCode());
    }

    /**
     * @covers ::getMap
     */
    public function testGetMap()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MapInterface', $this->sut->getMap());
    }

    /**
     * @covers ::getTranslations
     */
    public function testGetTranslations()
    {
        $this->assertInternalType('array', $this->sut->getTranslations());
        foreach ($this->sut->getTranslations() as $translation) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryCityTranslation', $translation);
        }
    }

    /**
     * @covers ::getLocation
     */
    public function testGetLocation()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\LocationInterface', $this->sut->getLocation());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
        $this->assertTrue($this->sut->isPublished());
    }

}

