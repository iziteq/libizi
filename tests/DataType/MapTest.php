<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MapTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Map;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Map
 */
class MapTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "route": "59.93169400245311,30.35469910138545;59.93157574143709,30.355364289221143;59.93155423938887,30.355879273352002;59.93040385948951,30.355106797155713;59.93056513010406,30.354334320959424;59.930871542111696,30.35196324819026",
  "bounds": "59.9285201177275,30.3512062,59.9328077,30.360621418890332"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Map
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Map::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Map::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        Map::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getBounds
     */
    public function testGetBounds()
    {
        $this->assertSame('59.9285201177275,30.3512062,59.9328077,30.360621418890332',
          $this->sut->getBounds());
    }

    /**
     * @covers ::getRoute
     */
    public function testGetRoute()
    {
        $this->assertSame('59.93169400245311,30.35469910138545;59.93157574143709,30.355364289221143;59.93155423938887,30.355879273352002;59.93040385948951,30.355106797155713;59.93056513010406,30.354334320959424;59.930871542111696,30.35196324819026',
          $this->sut->getRoute());
    }

}
