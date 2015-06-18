<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactPublisher
 */
class CompactPublisherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactPublisher
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactPublisher::createFromJson(TestHelper::getJsonResponse('publisher_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        CompactPublisher::createFromJson(TestHelper::getJsonResponse('publisher_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactPublisher::createFromJson($json,
          MultipleFormInterface::FORM_COMPACT);
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
        $this->assertSame('Amsterdam Museum', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen. ',
          $this->sut->getSummary());
    }

}
