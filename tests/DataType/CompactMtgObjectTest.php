<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactMtgObjectTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactMtgObject;
use Triquanta\IziTravel\DataType\MtgObjectInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactMtgObject
 */
class CompactMtgObjectTest extends \PHPUnit_Framework_TestCase
{

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
    protected $visibleOnMaps = false;

    /**
     * The language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    protected $route;

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
     * @return \Triquanta\IziTravel\DataType\MediaInterface[]
     */
    protected $images = [];

    /**
     * The number of child objects.
     *
     * @return int|null
     */
    protected $numberOfChildren;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObject
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->category = MtgObjectInterface::CATEGORY_BIKE;

        $this->status = (bool) mt_rand(0, 1);;

        $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

        $this->triggerZones = [
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
        ];

        $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

        $this->purchase = $this->getMock('\Triquanta\IziTravel\DataType\PurchaseInterface');

        $this->duration = mt_rand();

        $this->distance = mt_rand();

        $this->placement = MtgObjectInterface::PLACEMENT_OUTDOOR;

        $this->visibleOnMaps = (bool) mt_rand(0, 1);

        $this->languageCode = 'uk';

        $this->route = '59.93169400245311,30.35469910138545;59.93157574143709,30.355364289221143;59.93155423938887,30.355879273352002;59.93040385948951,30.355106797155713;59.93056513010406,30.354334320959424;59.930871542111696,30.35196324819026';

        $this->title = 'Foo to the bar';

        $this->title = 'A story about foo to the bar.';

        $this->images = [
          $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\MediaInterface'),
        ];

        $this->numberOfChildren = mt_rand();

        $this->sut = new CompactMtgObject($this->uuid,
          $this->availableLanguageCodes, $this->category, $this->status,
          $this->location, $this->triggerZones, $this->contentProvider,
          $this->purchase, $this->duration, $this->distance, $this->placement,
          $this->visibleOnMaps, $this->languageCode, $this->route, $this->title,
          $this->summary, $this->images, $this->numberOfChildren);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "type":       "story_navigation",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "category":   "bike",
  "status":     "published",
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

        CompactMtgObject::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactMtgObject::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
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

        CompactMtgObject::createFromJson($json);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getRoute
     */
    public function testGetRoute()
    {
        $this->assertSame($this->route, $this->sut->getRoute());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame($this->title, $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame($this->summary, $this->sut->getSummary());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertSame($this->images, $this->sut->getImages());
    }

    /**
     * @covers ::countChildren
     */
    public function testCountChildren()
    {
        $this->assertSame($this->numberOfChildren, $this->sut->countChildren());
    }

}
