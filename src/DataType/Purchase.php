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
     * The product ID.
     *
     * @var string
     */
    protected $productId;

    /**
     * Creates a new instance.
     *
     * @param string $currencyCode
     *   An ISO 4217 currency code.
     * @param float $price
     * @param string $productId
     */
    public function __construct($currencyCode, $price, $productId)
    {
        $this->currencyCode = $currencyCode;
        $this->price = $price;
        $this->productId = $productId;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;
        return new static($data['currency'], $data['price'],
          $data['product_id']);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function getProductId()
    {
        return $this->productId;
    }

}
