<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\CircularTriggerZoneTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\CircularTriggerZone;

/**
 * @coversDefaultClass \Triquanta\IziTravel\CircularTriggerZone
 */
class CircularTriggerZoneTest extends \PHPUnit_Framework_TestCase
{

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
     * The radius.
     *
     * @var float|null
     */
    protected $radius;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\CircularTriggerZone
     */
    protected $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->latitude = 12.345;
        $this->longitude = 67.890;
        $this->altitude = 123.098;
        $this->radius = mt_rand() / 100;

        $this->sut = new CircularTriggerZone($this->latitude, $this->longitude,
          $this->altitude, $this->radius);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "type":             "circle",
  "circle_latitude":  52.4341477399124,
  "circle_longitude": 4.81567904827443,
  "circle_radius":    818.92609425069
}
JSON;

        CircularTriggerZone::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CircularTriggerZone::createFromJson($json);
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
     * @covers ::getRadius
     */
    public function testGetRadius()
    {
        $this->assertSame($this->radius, $this->sut->getRadius());
    }

}
