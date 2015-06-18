<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactMtgObjectBase
 */
class CompactMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CompactMtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('story_navigation_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     */
    public function testCreateFromJson()
    {


        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson(TestHelper::getJsonResponse('story_navigation_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
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
        $this->assertSame('Straight until', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('A story about foo to the bar.',
          $this->sut->getSummary());
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
