<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ConsumerTest.
 */

namespace Triquanta\IziTravel;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Consumer
 */
class ConsumerTest extends \PHPUnit_Framework_TestCase {

  /**
   * The custom storage.
   *
   * @var mixed[]
   */
  protected $customStorage;

  /**
   * The email address.
   *
   * @var string
   */
  protected $emailAddress;

  /**
   * The mobile phone number.
   *
   * @var string
   */
  protected $mobilePhoneNumber;

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The username.
   *
   * @var string
   */
  protected $username;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\Consumer
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->customStorage = [
      'foo' => mt_rand(),
    ];
    $this->emailAddress = 'foo@example.com';
    $this->username = 'foobar' . mt_rand();
    $this->mobilePhoneNumber = '+1234567890';
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->sut = new Consumer($this->uuid, $this->username, $this->emailAddress, $this->mobilePhoneNumber, $this->customStorage);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
  "uuid":  "9c7f358a-a963-456d-9977-3d4357e20756",
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

    Consumer::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    Consumer::createFromJson($json);
  }

  /**
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\MissingUuidFactoryException
   */
  public function testCreateFromJsonWithoutUuid() {
    $json = <<<'JSON'
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

    Consumer::createFromJson($json);
  }

  /**
   * @covers ::getCustomStorage
   */
  public function testGetCustomStorage() {
    $this->assertSame($this->customStorage, $this->sut->getCustomStorage());
  }

  /**
   * @covers ::getEmailAddress
   */
  public function testGetEmailAddress() {
    $this->assertSame($this->emailAddress, $this->sut->getEmailAddress());
  }

  /**
   * @covers ::getMobilePhoneNumber
   */
  public function testGetMobilePhoneNumber() {
    $this->assertSame($this->mobilePhoneNumber, $this->sut->getMobilePhoneNumber());
  }

  /**
   * @covers ::getUsername
   */
  public function testGetUsername() {
    $this->assertSame($this->username, $this->sut->getUserName());
  }

}
