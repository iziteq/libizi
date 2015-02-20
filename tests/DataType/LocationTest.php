<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\LocationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Location;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Location
 */
class LocationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The UUID of the city this location is in.
     *
     * @var string|null
     */
    protected $cityUuid;

    /**
     * The UUID of the country this location is in.
     *
     * @var string|null
     */
    protected $countryUuid;

    /**
     * The code of the country this location is in.
     *
     * @var string|null
     *   An ISO 3166-1 alpha-2 code or NULL.
     */
    protected $countryCode;

    /**
     * The latitude.
     *
     * @var float|null
     */
    protected $latitude;

    /**
     * The longitude.
     *
     * @var float|null
     */
    protected $longitude;

    /**
     * The altitude.
     *
     * @var float|null
     */
    protected $altitude;

    /**
     * The exhibit number.
     *
     * @var string|null
     */
    protected $exhibitNumber;

    /**
     * The public IP address.
     *
     * @var string|null
     */
    protected $publicIpAddress;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Location
     */
    protected $sut;

    public function setUp()
    {
        $this->cityUuid = 'foo-bar-baz-' . mt_rand();
        $this->countryUuid = 'foo-bar-baz-' . mt_rand();
        $this->countryCode = 'UK';
        $this->latitude = 12.345;
        $this->longitude = 67.890;
        $this->altitude = 123.098;
        $this->exhibitNumber = mt_rand();
        $this->publicIpAddress = '12.34.56.78';

        $this->sut = new Location($this->latitude, $this->longitude,
          $this->altitude, $this->exhibitNumber, $this->publicIpAddress,
          $this->cityUuid, $this->countryUuid, $this->countryCode);
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
  "altitude":  0.0,
  "latitude":  59.9308144003772,
  "longitude": 30.3516736220902
}
JSON;

        Location::createFromJson($json);
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

        Location::createFromJson($json);
    }

    /**
     * @covers ::getLatitude
     */
    public function testGetLatitude()
    {
        $this->assertSame($this->latitude, $this->sut->getLatitude());
    }

    /**
     * @covers ::getLongitude
     */
    public function testGetLongitude()
    {
        $this->assertSame($this->longitude, $this->sut->getLongitude());
    }

    /**
     * @covers ::getAltitude
     */
    public function testGetAltitude()
    {
        $this->assertSame($this->altitude, $this->sut->getAltitude());
    }

    /**
     * @covers ::getExhibitNumber
     */
    public function testGetExhibitNumber()
    {
        $this->assertSame($this->exhibitNumber, $this->sut->getExhibitNumber());
    }

    /**
     * @covers ::getPublicIpAddress
     */
    public function testGetPublicIpAddress()
    {
        $this->assertSame($this->publicIpAddress,
          $this->sut->getPublicIpAddress());
    }

    /**
     * @covers ::getCityUuid
     */
    public function testGetCityUuid()
    {
        $this->assertSame($this->cityUuid,
          $this->sut->getCityUuid());
    }

    /**
     * @covers ::getCountryUuid
     */
    public function testGetCountryUuid()
    {
        $this->assertSame($this->countryUuid,
          $this->sut->getCountryUuid());
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame($this->countryCode,
          $this->sut->getCountryCode());
    }

}
