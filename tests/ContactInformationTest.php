<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ContactInformationTest.
 */

namespace Triquanta\IziTravel;

/**
 * @coversDefaultClass \Triquanta\IziTravel\ContactInformation
 */
class ContactInformationTest extends \PHPUnit_Framework_TestCase {

  /**
   * The website address.
   *
   * @var string|null
   */
  protected $website;

  /**
   * The country code.
   *
   * @var string
   *   An ISO 3166-1 alpha-2 country code.
   */
  protected $countryCode;

  /**
   * The name of the city.
   *
   * @var string
   */
  protected $city;

  /**
   * The address.
   *
   * @var string
   */
  protected $address;

  /**
   * The postal code.
   *
   * @var string|null
   */
  protected $postalCode;

  /**
   * The phone number.
   *
   * @var string|null
   */
  protected $phoneNumber;

  /**
   * The administrative subdivision.
   *
   * @var string|null
   */
  protected $administrativeSubdivision;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\ContactInformation
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->countryCode = 'UA';
    $this->city = 'Lviv';
    $this->address = 'Ploshcha Rynok';
    $this->postalCode = mt_rand();
    $this->administrativeSubdivision = 'Qux';
    $this->phoneNumber = '+1234567890';
    $this->website = 'http://example.com';

    $this->sut = new ContactInformation($this->countryCode, $this->city, $this->address, $this->postalCode, $this->administrativeSubdivision, $this->phoneNumber, $this->website);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
  "phone_number": "79035935578",
  "website": "http://google.com",
  "country": "nl",
  "city": "Amsterdam",
  "address": "Spaarndammerplantsoen 21/4",
  "postcode": "70044"
}
JSON;

    ContactInformation::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    ContactInformation::createFromJson($json);
  }

  /**
   * @covers ::getWebsite
   */
  public function testGetWebsite() {
    $this->assertSame($this->website, $this->sut->getWebsite());
  }

  /**
   * @covers ::getCountryCode
   */
  public function testGetCountryCode() {
    $this->assertSame($this->countryCode, $this->sut->getCountryCode());
  }

  /**
   * @covers ::getCity
   */
  public function testGetCity() {
    $this->assertSame($this->city, $this->sut->getCity());
  }

  /**
   * @covers ::getAddress
   */
  public function testGetAddress() {
    $this->assertSame($this->address, $this->sut->getAddress());
  }

  /**
   * @covers ::getPostalCode
   */
  public function testGetPostalCode() {
    $this->assertSame($this->postalCode, $this->sut->getPostalCode());
  }

  /**
   * @covers ::getPhoneNumber
   */
  public function testGetPhoneNumber() {
    $this->assertSame($this->phoneNumber, $this->sut->getPhoneNumber());
  }

  /**
   * @covers ::getAdministrativeSubdivision
   */
  public function testGetAdministrativeSubdivision() {
    $this->assertSame($this->administrativeSubdivision, $this->sut->getAdministrativeSubdivision());
  }

}
