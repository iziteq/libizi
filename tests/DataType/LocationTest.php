<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\LocationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Location;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Location
 */
class LocationTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "city_uuid": "8881e8de-d426-4cef-91b3-0c2ca298ab0b",
    "altitude": 0,
    "country_code": "fr",
    "country_uuid": "1204cada-f918-49cd-8483-81795d69e2bd",
    "latitude": 48.7988217036239,
    "longitude": 2.12748527526855,
    "number": 134,
    "ip": "92.111.222.50"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Location
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Location::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Location::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        Location::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getLatitude
     */
    public function testGetLatitude()
    {
        $this->assertSame(48.7988217036239, $this->sut->getLatitude());
    }

    /**
     * @covers ::getLongitude
     */
    public function testGetLongitude()
    {
        $this->assertSame(2.12748527526855, $this->sut->getLongitude());
    }

    /**
     * @covers ::getAltitude
     */
    public function testGetAltitude()
    {
        $this->assertSame(0, $this->sut->getAltitude());
    }

    /**
     * @covers ::getExhibitNumber
     */
    public function testGetExhibitNumber()
    {
        $this->assertSame(134, $this->sut->getExhibitNumber());
    }

    /**
     * @covers ::getPublicIpAddress
     */
    public function testGetPublicIpAddress()
    {
        $this->assertSame('92.111.222.50', $this->sut->getPublicIpAddress());
    }

    /**
     * @covers ::getCityUuid
     */
    public function testGetCityUuid()
    {
        $this->assertSame('8881e8de-d426-4cef-91b3-0c2ca298ab0b',
          $this->sut->getCityUuid());
    }

    /**
     * @covers ::getCountryUuid
     */
    public function testGetCountryUuid()
    {
        $this->assertSame('1204cada-f918-49cd-8483-81795d69e2bd',
          $this->sut->getCountryUuid());
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame('fr', $this->sut->getCountryCode());
    }

}
