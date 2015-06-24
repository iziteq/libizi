<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactMuseumTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactMuseum;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactMuseum
 */
class CompactMuseumTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMuseum
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactMuseum::createFromJson(TestHelper::getJsonResponse('museum_compact_include_all'), MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CompactMuseum::createFromJson(TestHelper::getJsonResponse('museum_compact_include_all'), MultipleFormInterface::FORM_FULL);
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

        CompactMuseum::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getPurchase
     */
    public function testGetPurchase()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PurchaseInterface', $this->sut->getPurchase());
    }

}
