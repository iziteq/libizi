<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PolygonalTriggerZoneTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\PolygonalTriggerZone;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PolygonalTriggerZone
 */
class PolygonalTriggerZoneTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "type": "polygon",
  "polygon_corners": "52.397921441224504,4.8016028153642765;52.4188651275828,4.835248445247089;52.42095894931356,4.788556550715839;52.40734733067369,4.778600190852558"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PolygonalTriggerZone
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = PolygonalTriggerZone::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        PolygonalTriggerZone::createFromJson($this->json,
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

        PolygonalTriggerZone::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getCorners
     */
    public function testGetCorners()
    {
        $this->assertSame('52.397921441224504,4.8016028153642765;52.4188651275828,4.835248445247089;52.42095894931356,4.788556550715839;52.40734733067369,4.778600190852558',
          $this->sut->getCorners());
    }

}
