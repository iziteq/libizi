<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CityByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\CityByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\CityByUuid
 */
class CityByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\CityByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = CityByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = CityByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = CityByUuid::create($this->productionRequestHandler);

        $uuid = '3f879f37-21b0-479d-bd74-aa26f72fa328';
        $languageCodes = ['en'];

        $mtgObject = $this->sut->setUuid($uuid)
          ->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->execute();

        $this->assertInstanceOf($instanceof, $mtgObject);
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
