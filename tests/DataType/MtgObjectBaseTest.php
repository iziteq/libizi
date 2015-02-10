<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\PublishableInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\MtgObjectBase
 */
class MtgObjectBaseTest extends \PHPUnit_Framework_TestCase
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
     * @var \Triquanta\IziTravel\DataType\MtgObjectBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'jkhsg897q309hkjghif89qu0r3qhjkfah';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->status = array_rand([PublishableInterface::STATUS_PUBLISHED, PublishableInterface::STATUS_LIMITED]);

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

        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\MtgObjectBase',
          [
            $this->uuid,
            $this->revisionHash,
            $this->availableLanguageCodes,
            $this->status,
            $this->location,
            $this->triggerZones,
            $this->contentProvider,
            $this->purchase,
            $this->visibleOnMaps
          ]);
    }

    /**
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\MtgObjectBase',
          [
            $this->uuid,
            $this->revisionHash,
            $this->availableLanguageCodes,
            $this->status,
            $this->location,
            $this->triggerZones,
            $this->contentProvider,
            $this->purchase,
            $this->visibleOnMaps
          ]);
    }

    /**
     * @covers ::getAvailableLanguageCodes
     */
    public function testGetAvailableLanguageCodes()
    {
        $this->assertSame($this->availableLanguageCodes,
          $this->sut->getAvailableLanguageCodes());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
      if ($this->status === PublishableInterface::STATUS_PUBLISHED) {
        $this->assertTrue($this->sut->isPublished());
      }
      else {
        $this->assertFalse($this->sut->isPublished());
      }
    }

    /**
     * @covers ::getLocation
     */
    public function testGetLocation()
    {
        $this->assertSame($this->location, $this->sut->getLocation());
    }

    /**
     * @covers ::getTriggerZones
     */
    public function testGetTriggerZones()
    {
        $this->assertSame($this->triggerZones, $this->sut->getTriggerZones());
    }

    /**
     * @covers ::getContentProvider
     */
    public function testGetContentProvider()
    {
        $this->assertSame($this->contentProvider,
          $this->sut->getContentProvider());
    }

    /**
     * @covers ::getPurchase
     */
    public function testGetPurchase()
    {
        $this->assertSame($this->purchase, $this->sut->getPurchase());
    }

}
