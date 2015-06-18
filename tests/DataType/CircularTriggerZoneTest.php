<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CircularTriggerZoneTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CircularTriggerZone;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CircularTriggerZone
 */
class CircularTriggerZoneTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "type":             "circle",
  "circle_latitude":  52.4341477399124,
  "circle_longitude": 4.81567904827443,
  "circle_radius":    818.92609425069,
  "circle_altitude":         13
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CircularTriggerZone
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CircularTriggerZone::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CircularTriggerZone::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
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

        CircularTriggerZone::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getLatitude
     */
    public function testGetLatitude()
    {
        $this->assertSame(52.4341477399124, $this->sut->getLatitude());
    }

    /**
     * @covers ::getLongitude
     */
    public function testGetLongitude()
    {
        $this->assertSame(4.81567904827443, $this->sut->getLongitude());
    }

    /**
     * @covers ::getAltitude
     */
    public function testGetAltitude()
    {
        $this->assertSame(13, $this->sut->getAltitude());
    }

    /**
     * @covers ::getRadius
     */
    public function testGetRadius()
    {
        $this->assertSame(818.92609425069, $this->sut->getRadius());
    }

}
