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
     * The purchase.
     *
     * @var \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    protected $purchase;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PaidDataTrait
     */
    protected $sut;

    public function setUp()
    {
        $this->purchase = $this->getMock('\Triquanta\IziTravel\DataType\PurchaseInterface');

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
     * @param \Triquanta\IziTravel\DataType\PurchaseInterface $purchase
     *   The purchase data object.
     */
    public function __construct(
      PurchaseInterface $purchase
    ) {
        $this->purchase = $purchase;
    }
}
