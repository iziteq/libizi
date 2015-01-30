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

    /**
     * Creates a new instance.
     *
     * @param string $currencyCode
     *   An ISO 4217 currency code.
     * @param float $price
     */
    public function __construct($currencyCode, $price)
    {
        $this->currencyCode = $currencyCode;
        $this->price = $price;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;
        return new static($data['currency'], $data['price']);
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
