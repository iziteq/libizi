<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\TriggerZoneTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\TriggerZone;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\TriggerZone
 */
class TriggerZoneTest extends \PHPUnit_Framework_TestCase
{

    protected $jsonCircular = <<<'JSON'
{
  "type":             "circle",
  "circle_latitude":  52.4341477399124,
  "circle_longitude": 4.81567904827443,
  "circle_radius":    818.92609425069
}
JSON;

    protected $jsonPolygonal = <<<'JSON'
{
  "type": "polygon",
  "polygon_corners": "52.397921441224504,4.8016028153642765;52.4188651275828,4.835248445247089;52.42095894931356,4.788556550715839;52.40734733067369,4.778600190852558"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\TriggerZone
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = TriggerZone::createFromJson($this->jsonCircular,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJsonWithCircularTriggerZone()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CircularTriggerZoneInterface',
          TriggerZone::createFromJson($this->jsonCircular,
            MultipleFormInterface::FORM_FULL));
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJsonWithPolygonalTriggerZone()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PolygonalTriggerZoneInterface',
          TriggerZone::createFromJson($this->jsonPolygonal,
            MultipleFormInterface::FORM_FULL));
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
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

        TriggerZone::createFromJson($json, MultipleFormInterface::FORM_FULL);
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

        TriggerZone::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

}
