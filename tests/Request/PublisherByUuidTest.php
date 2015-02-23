<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\PublisherByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\PublisherByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\PublisherByUuid
 */
class PublisherByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\PublisherByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = PublisherByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = PublisherByUuid::create($this->requestHandler);
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
          [MultipleFormInterface::FORM_FULL, '\Triquanta\IziTravel\DataType\FullPublisherInterface'],
          [MultipleFormInterface::FORM_COMPACT, '\Triquanta\IziTravel\DataType\CompactPublisherInterface'],
        ];
    }

}
