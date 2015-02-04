<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherContactInformationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\PublisherContactInformation;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherContactInformation
 */
class PublisherContactInformationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The website URL.
     *
     * @var string|null
     */
    protected $websiteUrl;

    /**
     * The email address.
     *
     * @var string|null
     */
    protected $emailAddress;

    /**
     * The URL to the Twitter account.
     *
     * @var string|null
     */
    protected $twitterUrl;

    /**
     * The URL to the Facebook page.
     *
     * @var string|null
     */
    protected $facebookUrl;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherContactInformation
     */
    protected $sut;

    public function setUp()
    {
        $this->websiteUrl = 'http://example.com/foo/' . mt_rand();

        $this->emailAddress = 'example@example.com';

        $this->twitterUrl = 'http://example.com/foo/' . mt_rand();

        $this->facebookUrl = 'http://example.com/foo/' . mt_rand();

        $this->sut = new PublisherContactInformation($this->websiteUrl,
          $this->emailAddress, $this->twitterUrl, $this->facebookUrl);
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
    "website": "http://www.amsterdammuseum.nl",
    "twitter": "https://twitter.com/AmsterdamMuseum",
    "facebook": "https://www.facebook.com/amsterdammuseum"
}
JSON;

        PublisherContactInformation::createFromJson($json);
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

        PublisherContactInformation::createFromJson($json);
    }

    /**
     * @covers ::getWebsiteUrl
     */
    public function testGetWebsiteUrl()
    {
        $this->assertSame($this->websiteUrl, $this->sut->getWebsiteUrl());
    }

    /**
     * @covers ::getEmailAddress()
     */
    public function testGetEmailAddress()
    {
        $this->assertSame($this->emailAddress, $this->sut->getEmailAddress());
    }

    /**
     * @covers ::getTwitterUrl
     */
    public function testGetTwitterUrl()
    {
        $this->assertSame($this->twitterUrl, $this->sut->getTwitterUrl());
    }

    /**
     * @covers ::getFacebookUrl
     */
    public function testGetFacebookUrl()
    {
        $this->assertSame($this->facebookUrl, $this->sut->getFacebookUrl());
    }

}
