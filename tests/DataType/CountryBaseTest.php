<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryBase;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryBase
 */
class CountryBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CountryBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CountryBase');
        /** @var \Triquanta\IziTravel\DataType\CountryBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('country_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromData()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullCountryInterface',
          CountryBase::createFromJson(TestHelper::getJsonResponse('country_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactCountryInterface',
          CountryBase::createFromJson(TestHelper::getJsonResponse('country_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame('nl', $this->sut->getCountryCode());
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
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryCityTranslation',
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
        $this->assertTrue($this->sut->isPublished());
    }

}

