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
     * @param string $currency_code
     *   An ISO 4217 currency code.
     * @param float $price
     * @param string $product_id
     */
    public function __construct($currency_code, $price, $product_id)
    {
        $this->currencyCode = $currency_code;
        $this->price = $price;
        $this->productId = $product_id;
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
