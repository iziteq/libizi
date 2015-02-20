<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactTourTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactTour;
use Triquanta\IziTravel\DataType\TourInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactTour
 */
class CompactTourTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The data type.
     *
     * @var string
     */
    protected $type;

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
     * Whether the object is published.
     *
     * @return bool
     */
    protected $status;

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    /**
     * The trigger zones.
     *
     * @var \Triquanta\IziTravel\DataType\TriggerZoneInterface[]
     */
    protected $triggerZones = [];

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    /**
     * The purchase.
     *
     * @var \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    protected $purchase;

    /**
     * The language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @return string
     */
    protected $title;

    /**
     * The summary.
     *
     * @return string
     */
    protected $summary;

    /**
     * The images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

    /**
     * The number of child objects.
     *
     * @return int|null
     */
    protected $numberOfChildren;

    /**
     * Gets the category.
     *
     * @var string
     *   One of the static::CATEGORY_* constants.
     */
    protected $category;

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
     * The route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    protected $route;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactTour|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->type = 'foo_bar_' . mt_rand();

        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'hwg98309t82ohtwqlekhgf0823yt';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->status = TourInterface::STATUS_PUBLISHED;

        $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

        $this->triggerZones = [
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
        ];

        $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

        $this->purchase = $this->getMock('\Triquanta\IziTravel\DataType\PurchaseInterface');

        $this->languageCode = 'uk';

        $this->title = 'Foo & Bar ' . mt_rand();

        $this->summary = 'A story about Foo & Bar ' . mt_rand();

        $this->images = [
          $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ImageInterface'),
        ];

        $this->numberOfChildren = mt_rand();

        $this->category = TourInterface::CATEGORY_BIKE;

        $this->duration = mt_rand();

        $this->distance = mt_rand();

        $this->placement = TourInterface::PLACEMENT_OUTDOOR;

        $this->route = 'foo;bar;';

        $this->sut = new CompactTour($this->type, $this->uuid, $this->revisionHash,
          $this->availableLanguageCodes, $this->status, $this->location,
          $this->triggerZones, $this->contentProvider, $this->purchase,
          $this->languageCode, $this->title, $this->summary, $this->images,
          $this->numberOfChildren, $this->category, $this->duration,
          $this->distance, $this->placement, $this->route);
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
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "hash":       "65dd8712d7b793b1a327fbef9e51a60d2a54ccdc",
  "type":       "tour",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "category":   "bike",
  "status":     "published",
  "duration":   123,
  "distance":   123,
  "placement":  "outdoor",
  "language": "en",
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
  ]
}
JSON;

        CompactTour::createFromJson($json);
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

        CompactTour::createFromJson($json);
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
{}
JSON;

        CompactTour::createFromJson($json);
    }

    /**
     * @covers ::getRoute
     */
    public function testGetRoute()
    {
        $this->assertSame($this->route, $this->sut->getRoute());
    }

}
