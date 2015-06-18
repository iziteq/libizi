<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\PublisherBase;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherBase
 */
class PublisherBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\PublisherBase');
        /** @var \Triquanta\IziTravel\DataType\PublisherBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('publisher_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullPublisherInterface',
          PublisherBase::createFromJson(TestHelper::getJsonResponse('publisher_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactPublisherInterface',
          PublisherBase::createFromJson(TestHelper::getJsonResponse('publisher_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
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

        /** @var \Triquanta\IziTravel\DataType\PublisherBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContentProvider
     */
    public function testGetContentProvider()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ContentProviderInterface',
          $this->sut->getContentProvider());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
        $this->assertTrue($this->sut->isPublished());
    }

}
