<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\MtgObjectChildrenByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\MtgObjectChildrenByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\MtgObjectChildrenByUuid
 */
class MtgObjectChildrenByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\MtgObjectChildrenByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = MtgObjectChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = MtgObjectChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecute($form, $instanceof)
    {
        $uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';
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
