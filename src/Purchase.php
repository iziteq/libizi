<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Purchase.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a purchase data type.
 */
class Purchase implements PurchaseInterface
{

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

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data;
        return new static($data['currency'], $data['price'],
          $data['product_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getProductId()
    {
        return $this->productId;
    }

}
