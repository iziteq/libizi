<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\FeaturedContentTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\Request\FeaturedContent;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\FeaturedContent
 */
class FeaturedContentTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\FeaturedContent
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = FeaturedContent::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = FeaturedContent::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     * @covers \Triquanta\IziTravel\Request\MultiLingualTrait::setLanguageCodes
     */
    public function testExecute()
    {
        $languageCodesOptions = ['en', 'nl', 'uk'];
        $languageCodes = [$languageCodesOptions[array_rand($languageCodesOptions)]];

        $expectedParameters = [
          'languages' => $languageCodes,
        ];

        $this->requestHandler->expects($this->once())
          ->method('get')
          ->with($this->isType('string'),
            new \PHPUnit_Framework_Constraint_IsEqual($expectedParameters))
          ->willReturn(json_encode([]));

        $this->sut->setLanguageCodes($languageCodes)
          ->execute();
    }

    /**
     * @covers ::execute
     *
     * @depends testExecute
     */
    public function testExecuteRealRequest()
    {
        $this->sut = FeaturedContent::create($this->productionRequestHandler);

        $languageCodes = ['en'];
        $this->sut->setLanguageCodes($languageCodes);

        $objects = $this->sut->execute();

        $this->assertInternalType('array', $objects);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($objects);
        foreach ($objects as $object) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FeaturedContentInterface',
              $object);
        }
    }

}
