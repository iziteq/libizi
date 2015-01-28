<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\TriggerZoneTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\TriggerZone;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\TriggerZone
 */
class TriggerZoneTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The bounds.
     *
     * @var string
     *   The bounds are represented as WGS:84 in the OpenLayers Bounds format -
     *   left, bottom, right, top.
     *   Example: 36.0123075,122.0978486,36.0176986,122.0911837
     */
    protected $bounds;

    /**
     * The route.
     *
     * @var string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\TriggerZone
     */
    protected $sut;

    public function setUp()
    {
        $this->bounds = '12.345;67.890';
        $this->route = '12.345;67.890';

        $this->sut = new TriggerZone($this->bounds, $this->route);
    }

    /**
     * @covers ::createFromJson
     */
    public function testCreateFromJsonWithCircularTriggerZone()
    {
        $json = <<<'JSON'
{
  "type":             "circle",
  "circle_latitude":  52.4341477399124,
  "circle_longitude": 4.81567904827443,
  "circle_radius":    818.92609425069
}
JSON;

        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CircularTriggerZoneInterface',
          TriggerZone::createFromJson($json));
    }

    /**
     * @covers ::createFromJson
     */
    public function testCreateFromJsonWithPolygonalTriggerZone()
    {
        $json = <<<'JSON'
{
  "type": "polygon",
  "polygon_corners": "52.397921441224504,4.8016028153642765;52.4188651275828,4.835248445247089;52.42095894931356,4.788556550715839;52.40734733067369,4.778600190852558"
}
JSON;

        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PolygonalTriggerZoneInterface',
          TriggerZone::createFromJson($json));
    }

    /**
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidTriggerZoneTypeFactoryException
     */
    public function testCreateFromJsonWithInvalidTriggerZoneType()
    {
        $json = <<<'JSON'
{
  "type": "foo"
}
JSON;

        TriggerZone::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        TriggerZone::createFromJson($json);
    }

}
