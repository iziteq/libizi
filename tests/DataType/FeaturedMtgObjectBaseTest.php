<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FeaturedMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase
 */
class FeaturedMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
        "uuid": "679a3513-addc-4a1c-849e-874362e49017",
        "name": "Maastricht, eeuwige allure",
        "status": "published",
        "type": "tour",
        "description": "",
        "language": "nl",
        "content_language": "nl",
        "content_languages": [
            "nl"
        ],
        "images": [
            {
                "uuid": "28a4f4e1-f5c7-438c-9a5d-df85d9722895",
                "type": "image"
            }
        ],
        "promoted": false,
        "position": 2,
        "city_uuid": "1a99552c-b1ae-4225-ad5d-cf6f505b0db8",
        "country_uuid": "15845ecf-4274-4286-b086-e407ff8207de"
    }
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FeaturedMtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getCityUuid
     */
    public function testGetCityUuid()
    {
        $this->assertSame('1a99552c-b1ae-4225-ad5d-cf6f505b0db8',
          $this->sut->getCityUuid());
    }

    /**
     * @covers ::getCountryUuid
     */
    public function testGetCountryUuid()
    {
        $this->assertSame('15845ecf-4274-4286-b086-e407ff8207de',
          $this->sut->getCountryUuid());
    }

}
