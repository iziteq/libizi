<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CitiesTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\Cities;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\Cities
 */
class CitiesTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\Cities
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = Cities::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = Cities::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = Cities::create($this->productionRequestHandler);

        $languageCodes = ['en'];
        $limit = mt_rand(1, 9);

        $cities = $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setLimit($limit)
          ->execute();

        $this->assertInternalType('array', $cities);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($cities);
        $this->assertTrue(count($cities) <= $limit);
        foreach ($cities as $city) {
            $this->assertInstanceOf($instanceof, $city);
        }
    }

    /**
     * Provides data to self::testExecute
     */
    public function providerTestExecute() {
        return [
          [MultipleFormInterface::FORM_FULL, '\Triquanta\IziTravel\DataType\FullCityInterface'],
          [MultipleFormInterface::FORM_COMPACT, '\Triquanta\IziTravel\DataType\CompactCityInterface'],
        ];
    }

}
