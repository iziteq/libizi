<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PurchaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\Purchase;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Purchase
 */
class PurchaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "price":      111.0,
  "currency":   "EUR",
  "product_id": "fc02af68e47d4f26bc87e79f34fb37c8"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Purchase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Purchase::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Purchase::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        Purchase::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getCurrencyCode
     */
    public function testGetCurrencyCode()
    {
        $this->assertSame('EUR', $this->sut->getCurrencyCode());
    }

    /**
     * @covers ::getPrice
     */
    public function testGetPrice()
    {
        $this->assertSame(111.0, $this->sut->getPrice());
    }

}
