<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MediaTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\MediaBase
 */
class MediaBaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "uuid" : "d2cea5b6-a781-4d67-be7b-7c46f034e6ae",
    "type" : "story",
    "duration" : 44,
    "order" : 7,
    "hash" : "89754396ad760e91985c622ecb0acce5",
    "url" : "http://example.com/foo/89",
    "size" : 365477,
    "title": "Joepie!"
  }
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\MediaBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\MediaBase');
        /** @var \Triquanta\IziTravel\DataType\MediaBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        /** @var \Triquanta\IziTravel\DataType\MediaBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame('story', $this->sut->getType());
    }

    /**
     * @covers ::getOrder
     */
    public function testGetOrder()
    {
        $this->assertSame(7, $this->sut->getOrder());
    }

    /**
     * @covers ::getUrl
     */
    public function testGetUrl()
    {
        $this->assertSame('http://example.com/foo/89', $this->sut->getUrl());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame('Joepie!', $this->sut->getTitle());
    }

}
