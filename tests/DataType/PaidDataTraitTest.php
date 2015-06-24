<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PaidDataTraitTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\PurchaseInterface;
use Triquanta\IziTravel\DataType\PaidDataTrait;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PaidDataTrait
 */
class PaidDataTraitTest extends \PHPUnit_Framework_TestCase
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
     * @var \Triquanta\IziTravel\DataType\PaidDataTrait
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'jkhsg897q309hkjghif89qu0r3qhjkfah';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->status = (bool) mt_rand(0, 1);;

        $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

        $this->triggerZones = [
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\TriggerZoneInterface'),
        ];

        $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

        $this->purchase = $this->getMock('\Triquanta\IziTravel\DataType\PurchaseInterface');

        $this->visibleOnMaps = (bool) mt_rand(0, 1);

        $this->content = [
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\ContentInterface'),
        ];

        $this->sut = new PaidDataTraitTestTraitImplementation($this->purchase);
    }

    /**
     * @covers ::getPurchase
     */
    public function testGetPurchase()
    {
        $this->assertSame($this->purchase, $this->sut->getPurchase());
    }

}

class PaidDataTraitTestTraitImplementation
{

    use PaidDataTrait;

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
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface $purchase
     */
    public function __construct(
      PurchaseInterface $purchase
    ) {
        $this->purchase = $purchase;
    }
}
