<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CitiesByCountryUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\CitiesByCountryUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\CitiesByCountryUuid
 */
class CitiesByCountryUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\CitiesByCountryUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = CitiesByCountryUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = CitiesByCountryUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = CitiesByCountryUuid::create($this->productionRequestHandler);

        $uuid = '15845ecf-4274-4286-b086-e407ff8207de';
        $languageCodes = ['en'];

        $cities = $this->sut->setUuid($uuid)
          ->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->execute();

        $this->assertInternalType('array', $cities);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($cities);
        foreach ($cities as $city) {
            $this->assertInstanceOf($instanceof, $city);
        }
    }

    /**
     * Provides data to self::testExecute
     */
    public function providerTestExecute()
    {
        return [
          [
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullCityInterface'
          ],
          [
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactCityInterface'
          ],
        ];
    }

}
