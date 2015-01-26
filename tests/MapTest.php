<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\MapTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\Map;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Map
 */
class MapTest extends \PHPUnit_Framework_TestCase {

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
   * @var \Triquanta\IziTravel\Map
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->bounds = '12.345;67.890';
    $this->route = '12.345;67.890';

    $this->sut = new Map($this->bounds, $this->route);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
  "route": "59.93169400245311,30.35469910138545;59.93157574143709,30.355364289221143;59.93155423938887,30.355879273352002;59.93040385948951,30.355106797155713;59.93056513010406,30.354334320959424;59.930871542111696,30.35196324819026",
  "bounds": "59.9285201177275,30.3512062,59.9328077,30.360621418890332"
}
JSON;

    Map::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    Map::createFromJson($json);
  }

  /**
   * @covers ::getBounds
   */
  public function testGetBounds() {
    $this->assertSame($this->bounds, $this->sut->getBounds());
  }

  /**
   * @covers ::getRoute
   */
  public function testGetRoute() {
    $this->assertSame($this->route, $this->sut->getRoute());
  }

}
