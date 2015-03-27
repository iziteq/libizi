<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\MtgObjectByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\MtgObjectByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\MtgObjectByUuid
 */
class MtgObjectByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\MtgObjectByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = MtgObjectByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = MtgObjectByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = MtgObjectByUuid::create($this->productionRequestHandler);

        $uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';
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
          [MultipleFormInterface::FORM_FULL, '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'],
          [MultipleFormInterface::FORM_COMPACT, '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'],
        ];
    }

}
