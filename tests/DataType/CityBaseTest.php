<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CityBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CityBase;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CityBase
 */
class CityBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CityBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CityBase');
        /** @var \Triquanta\IziTravel\DataType\CityBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('city_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromData()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullCityInterface',
          CityBase::createFromJson(TestHelper::getJsonResponse('city_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactCityInterface',
          CityBase::createFromJson(TestHelper::getJsonResponse('city_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
    }

    /**
     * @covers ::getMap
     */
    public function testGetMap()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MapInterface',
          $this->sut->getMap());
    }

    /**
     * @covers ::getTranslations
     */
    public function testGetTranslations()
    {
        $this->assertInternalType('array', $this->sut->getTranslations());
        foreach ($this->sut->getTranslations() as $translation) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface',
              $translation);
        }
    }

    /**
     * @covers ::getLocation
     */
    public function testGetLocation()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\LocationInterface',
          $this->sut->getLocation());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
        $this->assertInternalType('bool', $this->sut->isPublished());
    }

    /**
     * @covers ::isVisible
     */
    public function testIsVisible()
    {
        $this->assertInternalType('bool', $this->sut->isVisible());
    }

}
