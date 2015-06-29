<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\TourTraitTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\PurchaseInterface;
use Triquanta\IziTravel\DataType\TourInterface;
use Triquanta\IziTravel\DataType\TourTrait;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\TourTrait
 */
class TourTraitTest extends \PHPUnit_Framework_TestCase
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
     * The revision hash.
     *
     * @var string
     */
    protected $revisionHash;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\TourTrait
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'jkhsg897q309hkjghif89qu0r3qhjkfah';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->category = TourInterface::CATEGORY_BIKE;

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

        $this->placement = TourInterface::PLACEMENT_OUTDOOR;

        $this->visibleOnMaps = (bool) mt_rand(0, 1);

        $this->content = [
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
        ];

        $this->sut = new TourTraitTestTraitImplementation($this->category,
          $this->duration, $this->distance, $this->placement, $this->purchase);
    }

    /**
     * @covers ::getCategory
     */
    public function testGetCategory()
    {
        $this->assertSame($this->category, $this->sut->getCategory());
    }

    /**
     * @covers ::getDuration
     */
    public function testGetDuration()
    {
        $this->assertSame($this->duration, $this->sut->getDuration());
    }

    /**
     * @covers ::getDistance
     */
    public function testGetDistance()
    {
        $this->assertSame($this->distance, $this->sut->getDistance());
    }

    /**
     * @covers ::getPlacement
     */
    public function testGetPlacement()
    {
        $this->assertSame($this->placement, $this->sut->getPlacement());
    }

}

class TourTraitTestTraitImplementation
{

    use TourTrait;

    /**
     * Constructs a new instance.
     *
     * @param string $category
     *   One of the static::CATEGORY_* constants.
     * @param int|null $duration
     *   The duration in seconds.
     * @param int|null $distance
     *   The distance in meters.
     * @param string|null $placement
     *   One of the static::PLACEMENT_* constants.
     */
    public function __construct(
      $category,
      $duration,
      $distance,
      $placement
    ) {
        $this->category = $category;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->placement = $placement;
    }
}
