<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\PublisherInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullPublisher
 */
class FullPublisherTest extends \PHPUnit_Framework_TestCase
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
    "content_provider": {
        "uuid": "d75cdc77-2376-4e9d-b62f-0338861420c0",
        "name": "Amsterdam Museum",
        "copyright": "Amsterdam Museum"
    },
    "contacts": {
        "website": "http://www.amsterdammuseum.nl",
        "twitter": "https://twitter.com/AmsterdamMuseum",
        "facebook": "https://www.facebook.com/amsterdammuseum"
    },
    "content": [
        {
            "title": "Amsterdam Museum",
            "summary": "Een ontmoetingsplek van en voor Amsterdammers en hét museum voor Nederlanders die de hoofdstad beter willen leren kennen. ",
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
                    "order": 1,
                    "hash": "baae2a048f560756a55f54f9d6bc58c8"
                }
            ]
        }
    ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullPublisher
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullPublisher::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     */
    public function testCreateFromJson()
    {


        FullPublisher::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        FullPublisher::createFromJson($json, MultipleFormInterface::FORM_FULL);
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

        FullPublisher::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PublisherContentInterface', $content);
        }
    }

    /**
     * @covers ::getContactInformation
     */
    public function testGetContactInformation()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PublisherContactInformationInterface', $this->sut->getContactInformation());
    }

}
