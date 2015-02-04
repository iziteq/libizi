<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\PublisherInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullPublisher
 */
class FullPublisherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The revision hash.
     *
     * @var string
     */
    protected $revisionHash;

    /**
     * The language codes for available translations.
     *
     * @var string[]
     *   Values are ISO 639-1 alpha-2 language codes.
     */
    protected $availableLanguageCodes = [];

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    /**
     * The content.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherContentInterface[]
     */
    protected $content = [];

    /**
     * The contact information.
     *
     * @return \Triquanta\IziTravel\DataType\PublisherContactInformationInterface[]
     */
    protected $contactInformation = [];

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullPublisher
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'hgo82ut097q398yquwfwhi4jt';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->status = PublisherInterface::STATUS_PUBLISHED;

        $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

        $this->content = [
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContentInterface'),
        ];

        $this->contactInformation = [
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContactInformationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContactInformationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\PublisherContactInformationInterface'),
        ];

        $this->sut = new FullPublisher($this->uuid, $this->revisionHash,
          $this->availableLanguageCodes, $this->contentProvider, $this->status,
          $this->content, $this->contactInformation);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
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
                    "order": 1
                }
            ]
        }
    ]
}
JSON;

        FullPublisher::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        FullPublisher::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
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

        FullPublisher::createFromJson($json);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertSame($this->content, $this->sut->getContent());
    }

    /**
     * @covers ::getContactInformation
     */
    public function testGetContactInformation()
    {
        $this->assertSame($this->contactInformation,
          $this->sut->getContactInformation());
    }

}
