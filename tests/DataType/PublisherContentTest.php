<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\PublisherContent;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherContent
 */
class PublisherContentTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "title": "Amsterdam Museum",
    "summary": "Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen.",
    "desc": "Het Amsterdam Museum vertelt het verhaal van de ......",
    "language": "en",
    "images": [
        {
            "uuid": "95e14c61-d879-456e-9085-47d5274c5d1d",
            "type": "brand_logo",
            "order": 1,
            "hash": "baae2a048f560756a55f54f9d6bc58c8",
            "size": 52621
        },
        {
            "uuid": "57deeecb-c5b0-4a8f-b561-7589ceb5c47b",
            "type": "brand_cover",
            "hash": "baae2a048f560756a55f54f9d6bc58c8",
            "order": 1
        }
    ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherContent
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = PublisherContent::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        PublisherContent::createFromJson($this->json,
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

        PublisherContent::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
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
        $this->assertSame('Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen.',
          $this->sut->getSummary());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame('Het Amsterdam Museum vertelt het verhaal van de ......',
          $this->sut->getDescription());
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
