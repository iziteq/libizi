<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CityContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CityContent;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CityContent
 */
class CityContentTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "title": "Amsterdam",
    "summary": "Mokum de beste!",
    "desc": "Hipstertown #1",
    "language": "en",
    "images": [
        {
            "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
            "type" : "story",
            "order" : 1,
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "size" : 231663
        }
    ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CityContent
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CityContent::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CityContent::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
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

        CityContent::createFromJson($json, MultipleFormInterface::FORM_FULL);
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
        $this->assertSame('Mokum de beste!', $this->sut->getSummary());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame('Hipstertown #1', $this->sut->getDescription());
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
