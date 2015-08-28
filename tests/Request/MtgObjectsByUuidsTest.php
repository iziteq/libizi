<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\MtgObjectsByUuidsTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\MtgObjectsByUuids;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\MtgObjectsByUuids
 */
class MtgObjectsByUuidsTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\MtgObjectsByUuids
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = MtgObjectsByUuids::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = MtgObjectsByUuids::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     * @covers ::setUuids
     * @covers \Triquanta\IziTravel\Request\FormTrait::setForm
     * @covers \Triquanta\IziTravel\Request\ModifiableTrait::setIncludes
     * @covers \Triquanta\IziTravel\Request\MultiLingualTrait::setLanguageCodes
     */
    public function testExecute()
    {
        $languageCodesOptions = ['en', 'nl', 'uk'];
        $languageCodes = [$languageCodesOptions[array_rand($languageCodesOptions)]];
        $formOptions = [
          MultipleFormInterface::FORM_COMPACT,
          MultipleFormInterface::FORM_FULL
        ];
        $form = $formOptions[array_rand($formOptions)];
        $includesOptions = ['city', 'country'];
        $includes = [$includesOptions[array_rand($includesOptions)]];
        $uuidOptions = [
          'bcf57367-77f6-4e39-9da6-1b481826501f',
          '3f879f37-21b0-479d-bd74-aa26f72fa328'
        ];
        $uuid = $uuidOptions[array_rand($uuidOptions)];

        $expectedParameters = [
          'languages' => $languageCodes,
          'includes' => $includes,
          'form' => $form,
        ];

        $this->requestHandler->expects($this->once())
          ->method('get')
          ->with($this->isType('string'),
            new \PHPUnit_Framework_Constraint_IsEqual($expectedParameters))
          ->willReturn(json_encode([json_decode(TestHelper::getJsonResponse('tour_full_include_all'))]));

        $this->sut->setLanguageCodes($languageCodes)
          ->setUuids([$uuid])
          ->setForm($form)
          ->setIncludes($includes)
          ->execute();
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     *
     * @depends      testExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = MtgObjectsByUuids::create($this->productionRequestHandler);

        $uuids = [
          'bcf57367-77f6-4e39-9da6-1b481826501f',
          '9a7d0fd4-aa50-4d12-a8fa-26f080cd7e0c'
        ];
        $languageCodes = ['en'];

        $mtgObjects = $this->sut->setUuids($uuids)
          ->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->execute();

        $this->assertInternalType('array', $mtgObjects);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($mtgObjects);
        foreach ($mtgObjects as $mtgObject) {
            $this->assertInstanceOf($instanceof, $mtgObject);
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
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
        ];
    }

}
