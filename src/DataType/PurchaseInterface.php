<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PurchaseInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a purchase data type.
 */
interface PurchaseInterface extends FactoryInterface
{

    /**
     * Gets the price.
     *
     * @return float
     */
    public function getPrice();

    /**
     * Gets the currency code.
     *
     * @return string
     */
    public function getCurrencyCode();

}
