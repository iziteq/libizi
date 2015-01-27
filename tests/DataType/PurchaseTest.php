<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PurchaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Purchase;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Purchase
 */
class PurchaseTest extends \PHPUnit_Framework_TestCase
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
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Purchase
     */
    protected $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->currencyCode = 'FOO';
        $this->price = mt_rand() / 100;
        $this->productId = 'foo-baz-' . mt_rand();

        $this->sut = new Purchase($this->currencyCode, $this->price,
          $this->productId);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "price":      111.0,
  "currency":   "EUR",
  "product_id": "fc02af68e47d4f26bc87e79f34fb37c8"
}
JSON;

        Purchase::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        Purchase::createFromJson($json);
    }

    /**
     * @covers ::getCurrencyCode
     */
    public function testGetCurrencyCode()
    {
        $this->assertSame($this->currencyCode, $this->sut->getCurrencyCode());
    }

    /**
     * @covers ::getPrice
     */
    public function testGetPrice()
    {
        $this->assertSame($this->price, $this->sut->getPrice());
    }

    /**
     * @covers ::getProductId
     */
    public function testGetProductId()
    {
        $this->assertSame($this->productId, $this->sut->getProductId());
    }

}
