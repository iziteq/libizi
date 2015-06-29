<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PaidDataTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\PaidDataInterface.
 */
trait PaidDataTrait
{

    /**
     * The purchase.
     *
     * @var \Triquanta\IziTravel\DataType\PurchaseInterface|null
     */
    protected $purchase;

    public function getPurchase()
    {
        return $this->purchase;
    }

}
