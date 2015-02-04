<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactTouristAttractionTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactTouristAttraction;
use Triquanta\IziTravel\DataType\TouristAttractionInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactTouristAttraction
 */
class CompactTouristAttractionTest extends \PHPUnit_Framework_TestCase
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
     * Whether the object must be visible on maps.
     *
     * @var bool
     */
    protected $visibleOnMaps = false;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactTouristAttraction|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'hwg98309t82ohtwqlekhgf0823yt';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->status = TouristAttractionInterface::STATUS_PUBLISHED;

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

        $this->visibleOnMaps = (bool) mt_rand(0, 1);

        $this->sut = new CompactTouristAttraction($this->uuid,
          $this->revisionHash, $this->availableLanguageCodes, $this->status,
          $this->location, $this->triggerZones, $this->contentProvider,
          $this->purchase, $this->languageCode, $this->title, $this->summary,
          $this->images, $this->numberOfChildren, $this->visibleOnMaps);
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
  "type":       "tourist_attraction",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "hidden":     true,
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

        CompactTouristAttraction::createFromJson($json);
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

        CompactTouristAttraction::createFromJson($json);
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

        CompactTouristAttraction::createFromJson($json);
    }

}
