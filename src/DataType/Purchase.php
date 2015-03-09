<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Purchase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a purchase data type.
 */
class Purchase implements PurchaseInterface
{

    use FactoryTrait;

    /**
     * The currency code.
     *
     * @var string
     *   An ISO 4217 currency code.
     */
    protected $currencyCode;

    /**
     * The price.
     *
     * @var float
     */
    protected $price;

    public static function createFromData(\stdClass $data, $form = null)
    {
        $purchase = new static();
        $purchase->currencyCode = $data->currency;
        $purchase->price = $data->price;

        return $purchase;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

}
