<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactPublisher
 */
class CompactPublisherTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "uuid": "7d84ef00-f4f6-4b90-89d7-f20207ee9ca6",
    "type": "publisher",
    "languages": [
        "en"
    ],
    "status": "published",
    "hash": "e8ce336bc687892e6b1a98cb9f7d1254128a17a6",
    "title": "Amsterdam Museum",
    "summary": "Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen.",
    "language": "en",
    "images": [
        {
            "uuid": "95e14c61-d879-456e-9085-47d5274c5d1d",
            "type": "brand_logo",
            "order": 1,
            "hash": "baae2a048f560756a55f54f9d6bc58c8",
            "size": 52621
        }
    ],
    "content_provider": {
        "uuid": "d75cdc77-2376-4e9d-b62f-0338861420c0",
        "name": "Amsterdam Museum",
        "copyright": "Amsterdam Museum"
    }
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactPublisher
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactPublisher::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        CompactPublisher::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
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

        CompactPublisher::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

        CompactPublisher::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ImageInterface', $image);
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
        $this->assertSame('Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen.', $this->sut->getSummary());
    }

}
