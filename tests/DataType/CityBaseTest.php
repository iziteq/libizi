<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CityBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CityInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CityBase
 */
class CityBaseTest extends \PHPUnit_Framework_TestCase
{

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The language.
   *
   * @var string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $languageCode;

  /**
   * The map.
   *
   * @var \Triquanta\IziTravel\DataType\MapInterface|null
   */
  protected $map;

  /**
   * The translations.
   *
   * @var \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[]
   */
  protected $translations = [];

  /**
   * The location.
   *
   * @var \Triquanta\IziTravel\DataType\LocationInterface|null
   */
  protected $location;

  /**
   * The status.
   *
   * @var string
   */
  protected $status;

  /**
   * The number of child objects.
   *
   * @return int|null
   */
  protected $numberOfChildren;

  /**
   * Whether the object must be visible in listings.
   *
   * @var bool
   */
  protected $visible = false;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\CityBase|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $sut;

  public function setUp()
  {
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->languageCode = 'uk';

    $this->map = $this->getMock('\Triquanta\IziTravel\DataType\MapInterface');

    $this->translations = [
      $this->getMock('\Triquanta\IziTravel\DataType\CityCityTranslationInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\CityCityTranslationInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\CityCityTranslationInterface'),
    ];

    $this->status = CityInterface::STATUS_PUBLISHED;

    $this->numberOfChildren = mt_rand();

    $this->visible = (bool) mt_rand(0, 1);

    $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

    $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CityBase',
      [
        $this->uuid,
        $this->map,
        $this->translations,
        $this->location,
        $this->status,
        $this->numberOfChildren,
        $this->visible
      ]);
  }

  /**
   * @covers ::__construct
   */
  public function test__Construct()
  {
    $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CityBase',
      [
        $this->uuid,
        $this->map,
        $this->translations,
        $this->location,
        $this->status,
        $this->numberOfChildren,
        $this->visible
      ]);
  }

  /**
   * @covers ::getMap
   */
  public function testGetMap()
  {
    $this->assertSame($this->map, $this->sut->getMap());
  }

  /**
   * @covers ::getTranslations
   */
  public function testGetTranslations()
  {
    $this->assertSame($this->translations, $this->sut->getTranslations());
  }

  /**
   * @covers ::getLocation
   */
  public function testGetLocation()
  {
    $this->assertSame($this->location, $this->sut->getLocation());
  }

  /**
   * @covers ::isPublished
   */
  public function testIsPublished()
  {
    $this->assertTrue($this->sut->isPublished());
  }

  /**
   * @covers ::countChildren
   */
  public function testCountChildren()
  {
    $this->assertSame($this->numberOfChildren, $this->sut->countChildren());
  }

  /**
   * @covers ::isVisible
   */
  public function testIsVisible()
  {
    $this->assertSame($this->visible, $this->sut->isVisible());
  }

}
