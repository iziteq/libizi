<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FeaturedMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase
 */
class FeaturedMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The status.
   *
   * @var string
   *   One of the \Triquanta\IziTravel\DataType\PublishableInterface::STATUS_*
   *   constants.
   */
  protected $status;

  /**
   * Whether the object is promoted.
   *
   * @var bool
   */
  protected $promoted;

  /**
   * The code of the language in which the object was requested.
   *
   * @var string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $requestedLanguageCode;

  /**
   * The content's language.
   *
   * @var string
   *   An ISO 639-1 alpha-2 language code.
   */
  protected $languageCode;

  /**
   * The name.
   *
   * @var string|null
   */
  protected $name;

  /**
   * The description.
   *
   * @var string|null
   */
  protected $description;

  /**
   * The position (order).
   *
   * @var int|null
   */
  protected $position;

  /**
   * The images.
   *
   * @var \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[]
   */
  protected $images = [];

  /**
   * The UUID of the city this content belongs to.
   *
   * @var string|null
   */
  protected $cityUuid;

  /**
   * The UUID of the country this content belongs to.
   *
   * @var string|null
   */
  protected $countryUuid;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase
   */
  protected $sut;

  public function setUp() {
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->status = array_rand([PublishableInterface::STATUS_PUBLISHED, PublishableInterface::STATUS_LIMITED]);

    $this->promoted = (bool) mt_rand(0, 1);

    $this->requestedLanguageCode = 'uk';

    $this->languageCode = 'uk';

    $this->name = 'Foo ' . mt_rand();

    $this->description = 'Foo & Bar, episode' . mt_rand();

    $this->position = mt_rand(1, 5);

    $this->cityUuid = 'foo-bar-baz-' . mt_rand();

    $this->countryUuid = 'foo-bar-baz-' . mt_rand();

    $this->images = [
      $this->getMock('\Triquanta\IziTravel\DataType\MtgObjectFeaturedContentImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface'),
      $this->getMock('\Triquanta\IziTravel\DataType\MtgObjectFeaturedContentImageInterface'),
    ];

    $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FeaturedMtgObjectBase', [
      $this->uuid, $this->status, $this->promoted, $this->requestedLanguageCode, $this->languageCode, $this->name, $this->description, $this->position, $this->images, $this->cityUuid, $this->countryUuid
    ]);
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
        "uuid": "679a3513-addc-4a1c-849e-874362e49017",
        "name": "Maastricht, eeuwige allure",
        "status": "published",
        "type": "tour",
        "description": "",
        "language": "nl",
        "content_language": "nl",
        "content_languages": [
            "nl"
        ],
        "images": [
            {
                "uuid": "28a4f4e1-f5c7-438c-9a5d-df85d9722895",
                "type": "image"
            }
        ],
        "promoted": false,
        "position": 2,
        "city_uuid": "1a99552c-b1ae-4225-ad5d-cf6f505b0db8",
        "country_uuid": "15845ecf-4274-4286-b086-e407ff8207de"
    }
JSON;

    /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
    $class = get_class($this->sut);
    $class::createFromJson($json);
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

    /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
    $class = get_class($this->sut);
    $class::createFromJson($json);
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

    /** @var \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase $class */
    $class = get_class($this->sut);
    $class::createFromJson($json);
  }

  /**
   * @covers ::getCityUuid
   */
  public function testGetCityUuid() {
    $this->assertSame($this->cityUuid, $this->sut->getCityUuid());
  }

  /**
   * @covers ::getCountryUuid
   */
  public function testGetCountryUuid() {
    $this->assertSame($this->countryUuid, $this->sut->getCountryUuid());
  }

}
