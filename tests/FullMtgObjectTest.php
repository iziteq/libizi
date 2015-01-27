<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\FullMtgObjectTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\FullMtgObject;
use Triquanta\IziTravel\MtgObjectInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\FullMtgObject
 */
class FullMtgObjectTest extends \PHPUnit_Framework_TestCase {

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The language codes for available translations.
   *
   * @var string[]
   *   Values are ISO 639-1 alpha-2 language codes.
   */
  protected $availableLanguageCodes = [];

  /**
   * Gets the category.
   *
   * @var string
   *   One of the static::CATEGORY_* constants.
   */
  protected $category;

  /**
   * Whether the object is published.
   *
   * @return bool
   */
  protected $status;

  /**
   * The location.
   *
   * @var \Triquanta\IziTravel\LocationInterface|null
   */
  protected $location;

  /**
   * The trigger zones.
   *
   * @var \Triquanta\IziTravel\TriggerZoneInterface[]
   */
  protected $triggerZones = [];

  /**
   * The content provider.
   *
   * @var \Triquanta\IziTravel\ContentProviderInterface
   */
  protected $contentProvider;

  /**
   * The purchase.
   *
   * @var \Triquanta\IziTravel\PurchaseInterface|null
   */
  protected $purchase;

  /**
   * The duration.
   *
   * @var int|null
   *   The duration in seconds.
   */
  protected $duration;

  /**
   * The distance.
   *
   * @var int|null
   *   The distance in meters.
   */
  protected $distance;

  /**
   * The placement.
   *
   * @var string|null
   *   One of the static::PLACEMENT_* constants.
   */
  protected $placement;

  /**
   * Whether the object must be visible on maps.
   *
   * @var bool
   */
  protected $visibleOnMaps = FALSE;

  /**
   * The UUID of the parent object.
   *
   * @var string|null
   */
  protected $parentUuid;

  /**
   * The schedule.
   *
   * @var \Triquanta\IziTravel\ScheduleInterface|null
   */
  protected $schedule;

  /**
   * The contact information.
   *
   * @var \Triquanta\IziTravel\ContactInformationInterface|null
   */
  protected $contactInformation;

  /**
   * The map.
   *
   * @var \Triquanta\IziTravel\MapInterface|null
   */
  protected $map;

  /**
   * The content.
   *
   * @var \Triquanta\IziTravel\ContentInterface[]
   */
  protected $content;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\FullMtgObject
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->availableLanguageCodes = ['nl', 'uk'];

    $this->category = MtgObjectInterface::CATEGORY_BIKE;

    $this->status = (bool) mt_rand(0, 1);;

    $this->location = $this->getMock('\Triquanta\IziTravel\LocationInterface');

    $this->triggerZones = [
      $this->getMock('\Triquanta\IziTravel\TriggerZoneInterface'),
      $this->getMock('\Triquanta\IziTravel\TriggerZoneInterface'),
      $this->getMock('\Triquanta\IziTravel\TriggerZoneInterface'),
    ];

    $this->contentProvider = $this->getMock('\Triquanta\IziTravel\ContentProviderInterface');

    $this->purchase = $this->getMock('\Triquanta\IziTravel\PurchaseInterface');

    $this->duration = mt_rand();

    $this->distance = mt_rand();

    $this->placement = MtgObjectInterface::PLACEMENT_OUTDOOR;

    $this->visibleOnMaps = (bool) mt_rand(0, 1);

    $this->parentUuid = 'foo-bar-qux-' . mt_rand();


    $this->schedule = $this->getMock('\Triquanta\IziTravel\ScheduleInterface');

    $this->contactInformation = $this->getMock('\Triquanta\IziTravel\ContactInformationInterface');

    $this->map = $this->getMock('\Triquanta\IziTravel\MapInterface');

    $this->content = [
      $this->getMock('\Triquanta\IziTravel\ContentInterface'),
      $this->getMock('\Triquanta\IziTravel\ContentInterface'),
      $this->getMock('\Triquanta\IziTravel\ContentInterface'),
    ];

    $this->sut = new FullMtgObject($this->uuid, $this->availableLanguageCodes, $this->category, $this->status, $this->location, $this->triggerZones, $this->contentProvider, $this->purchase, $this->duration, $this->distance, $this->placement, $this->visibleOnMaps, $this->parentUuid, $this->schedule, $this->contactInformation, $this->map, $this->content);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "type":       "story_navigation",
  "category":   "bike",
  "status":     "published",
  "languages":  ["en"],
  "content_provider": {
    "name": "Sample CP",
    "uuid": "15ad4ee2-ff55-4a86-950d-8dee4c79fc35"
  },
  "trigger_zones": [
    {
      "type":             "circle",
      "circle_latitude":  52.4341477399124,
      "circle_longitude": 4.81567904827443,
      "circle_radius":    818.92609425069
    }
  ],
  "location": {
    "altitude":  0.0,
    "latitude":  59.9308144003772,
    "longitude": 30.3516736220902
  },
  "content": [
    {
      "language":   "en",
      "title":      "Navigation Story",
      "summary":    "",
      "desc":       "",
      "playback": {
        "type": "sequential",
        "order": [
          "3afcd4ab-837f-4055-a8ed-ce43910f9446",
          "7b5092de-43f3-4762-9142-df30529f7942"
        ]
      },
      "images": [
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "audio": [
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "video": [
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "quiz": {
        "question": "Dolor illo iure beatae inventore fuga voluptatem quam error.",
        "comment": "Bla bla bla",
        "answers": [
          {
            "content": "Qq",
            "correct": false
          },
          {
            "content": "Wow",
            "correct": false
          },
          {
            "content": "Eeey",
            "correct": true
          }
        ]
      }
    }
  ]
}
JSON;

    FullMtgObject::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    FullMtgObject::createFromJson($json);
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

    FullMtgObject::createFromJson($json);
  }

  /**
   * @covers ::getParentUuid
   */
  public function testGetParentUuid() {
    $this->assertSame($this->parentUuid, $this->sut->getParentUuid());
  }

  /**
   * @covers ::getSchedule
   */
  public function testGetSchedule() {
    $this->assertSame($this->schedule, $this->sut->getSchedule());
  }

  /**
   * @covers ::getContactInformation
   */
  public function testGetContactInformation() {
    $this->assertSame($this->contactInformation, $this->sut->getContactInformation());
  }

  /**
   * @covers ::getMap
   */
  public function testGetMap() {
    $this->assertSame($this->map, $this->sut->getMap());
  }

  /**
   * @covers ::getContent
   */
  public function testGetContent() {
    $this->assertSame($this->content, $this->sut->getContent());
  }

}
