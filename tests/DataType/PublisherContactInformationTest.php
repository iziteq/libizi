<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherContactInformationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\PublisherContactInformation;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherContactInformation
 */
class PublisherContactInformationTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "website": "http://www.amsterdammuseum.nl",
    "twitter": "https://twitter.com/AmsterdamMuseum",
    "facebook": "https://www.facebook.com/amsterdammuseum",
    "googleplus": "http://plus.google.com/amsterdammuseum",
    "instagram": "http://instagram.com/amsterdammuseum",
    "youtube": "https://www.youtube.com/user/ahmamsterdam",
    "vk": "http://vk.com/user/ahmamsterdam",
    "email": "info@example.com"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherContactInformation
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = PublisherContactInformation::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        PublisherContactInformation::createFromJson($this->json,
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

        PublisherContactInformation::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getWebsiteUrl
     */
    public function testGetWebsiteUrl()
    {
        $this->assertSame('http://www.amsterdammuseum.nl',
          $this->sut->getWebsiteUrl());
    }

    /**
     * @covers ::getEmailAddress()
     */
    public function testGetEmailAddress()
    {
        $this->assertSame('info@example.com', $this->sut->getEmailAddress());
    }

    /**
     * @covers ::getTwitterUrl
     */
    public function testGetTwitterUrl()
    {
        $this->assertSame('https://twitter.com/AmsterdamMuseum',
          $this->sut->getTwitterUrl());
    }

    /**
     * @covers ::getFacebookUrl
     */
    public function testGetFacebookUrl()
    {
        $this->assertSame('https://www.facebook.com/amsterdammuseum',
          $this->sut->getFacebookUrl());
    }

    /**
     * @covers ::getGooglePlusUrl
     */
    public function testGetGooglePlusUrl()
    {
        $this->assertSame('http://plus.google.com/amsterdammuseum',
          $this->sut->getGooglePlusUrl());
    }

    /**
     * @covers ::getInstagramUrl
     */
    public function testGetInstagramUrl()
    {
        $this->assertSame('http://instagram.com/amsterdammuseum',
          $this->sut->getInstagramUrl());
    }

    /**
     * @covers ::getYoutubeUrl
     */
    public function testGetYoutubeUrl()
    {
        $this->assertSame('https://www.youtube.com/user/ahmamsterdam',
          $this->sut->getYouTubeUrl());
    }

    /**
     * @covers ::getVKUrl
     */
    public function testGetVKUrl()
    {
        $this->assertSame('http://vk.com/user/ahmamsterdam',
          $this->sut->getVKUrl());
    }
}
