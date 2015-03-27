<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CountryByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\CountryByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\CountryByUuid
 */
class CountryByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\CountryByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = CountryByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = CountryByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = CountryByUuid::create($this->productionRequestHandler);

        $uuid = '69929d8f-ba82-49b2-88fe-e5a0c687caca';
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
          [MultipleFormInterface::FORM_FULL, '\Triquanta\IziTravel\DataType\FullCountryInterface'],
          [MultipleFormInterface::FORM_COMPACT, '\Triquanta\IziTravel\DataType\CompactCountryInterface'],
        ];
    }

}
