<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\PublisherChildrenByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\PublisherChildrenByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\PublisherChildrenByUuid
 */
class PublisherChildrenByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\PublisherChildrenByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = PublisherChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = PublisherChildrenByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     */
    public function testExecute($form, $instanceof)
    {
        $uuid = '7d84ef00-f4f6-4b90-89d7-f20207ee9ca6';
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
