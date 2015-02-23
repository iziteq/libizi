<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CountryChildrenByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\CountryChildrenByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\CountryChildrenByUuid
 */
class CountryChildrenByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\CountryChildrenByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = CountryChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = CountryChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecute($form, $instanceof)
    {
        $uuid = '15845ecf-4274-4286-b086-e407ff8207de';
        $languageCodes = ['en'];
        $limit = mt_rand(1, 9);

        $mtgObjects = $this->sut->setUuid($uuid)
          ->setLanguageCodes($languageCodes)
          ->setLimit($limit)
          ->setForm($form)
          ->execute();

        $this->assertInternalType('array', $mtgObjects);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($mtgObjects);
        $this->assertTrue(count($mtgObjects) <= $limit);
        foreach ($mtgObjects as $mtgObject) {
            $this->assertInstanceOf($instanceof, $mtgObject);
        }
    }

    /**
     * Provides data to self::testExecute
     */
    public function providerTestExecute() {
        return [
          [MultipleFormInterface::FORM_FULL, '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'],
          [MultipleFormInterface::FORM_COMPACT, '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'],
        ];
    }

}
