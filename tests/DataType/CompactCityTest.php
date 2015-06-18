<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactCityTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactCity
 */
class CompactCityTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactCity|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactCity::createFromJson(TestHelper::getJsonResponse('city_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
     */
    public function testCreateFromJson()
    {

        CompactCity::createFromJson(TestHelper::getJsonResponse('city_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CityBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactCity::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('en', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame('Amsterdam', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('Damsko, jeweet.', $this->sut->getSummary());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ImageInterface',
              $image);
        }
    }

}
