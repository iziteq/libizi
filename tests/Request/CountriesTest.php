<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CountriesTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\Countries;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\Countries
 */
class CountriesTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\Countries
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = Countries::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = Countries::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecute($form, $instanceof)
    {
        $languageCodes = ['en'];
        $limit = mt_rand(1, 9);

        $countries = $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setLimit($limit)
          ->execute();

        $this->assertInternalType('array', $countries);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($countries);
        $this->assertTrue(count($countries) <= $limit);
        foreach ($countries as $city) {
            $this->assertInstanceOf($instanceof, $city);
        }
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
