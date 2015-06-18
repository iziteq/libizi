<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\ContactInformationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\ContactInformation;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\ContactInformation
 */
class ContactInformationTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "phone_number": "79035935578",
  "website": "http://google.com",
  "country": "nl",
  "city": "Amsterdam",
  "address": "Spaarndammerplantsoen 21/4",
  "postcode": "70044",
  "state": "Second-hand"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\ContactInformation
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = ContactInformation::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        ContactInformation::createFromJson($this->json,
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

        ContactInformation::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getWebsite
     */
    public function testGetWebsite()
    {
        $this->assertSame('http://google.com', $this->sut->getWebsite());
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame('nl', $this->sut->getCountryCode());
    }

    /**
     * @covers ::getCity
     */
    public function testGetCity()
    {
        $this->assertSame('Amsterdam', $this->sut->getCity());
    }

    /**
     * @covers ::getAddress
     */
    public function testGetAddress()
    {
        $this->assertSame('Spaarndammerplantsoen 21/4',
          $this->sut->getAddress());
    }

    /**
     * @covers ::getPostalCode
     */
    public function testGetPostalCode()
    {
        $this->assertSame('70044', $this->sut->getPostalCode());
    }

    /**
     * @covers ::getPhoneNumber
     */
    public function testGetPhoneNumber()
    {
        $this->assertSame('79035935578', $this->sut->getPhoneNumber());
    }

    /**
     * @covers ::getAdministrativeSubdivision
     */
    public function testGetAdministrativeSubdivision()
    {
        $this->assertSame('Second-hand',
          $this->sut->getAdministrativeSubdivision());
    }

}
