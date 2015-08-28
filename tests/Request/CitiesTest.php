<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\CitiesTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\Cities;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\Cities
 */
class CitiesTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\Cities
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = Cities::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = Cities::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     * @covers \Triquanta\IziTravel\Request\FormTrait::setForm
     * @covers \Triquanta\IziTravel\Request\LimitTrait::setLimit
     * @covers \Triquanta\IziTravel\Request\LimitTrait::setOffset
     * @covers \Triquanta\IziTravel\Request\ModifiableTrait::setIncludes
     * @covers \Triquanta\IziTravel\Request\MultiLingualTrait::setLanguageCodes
     */
    public function testExecute()
    {
        $languageCodesOptions = ['en', 'nl', 'uk'];
        $languageCodes = [$languageCodesOptions[array_rand($languageCodesOptions)]];
        $limit = mt_rand();
        $offset = mt_rand();
        $formOptions = [
          MultipleFormInterface::FORM_COMPACT,
          MultipleFormInterface::FORM_FULL
        ];
        $form = $formOptions[array_rand($formOptions)];
        $includesOptions = ['city', 'country'];
        $includes = [$includesOptions[array_rand($includesOptions)]];

        $expectedParameters = [
          'languages' => $languageCodes,
          'includes' => $includes,
          'form' => $form,
          'limit' => $limit,
          'offset' => $offset,
        ];

        $this->requestHandler->expects($this->once())
          ->method('get')
          ->with($this->isType('string'),
            new \PHPUnit_Framework_Constraint_IsEqual($expectedParameters))
          ->willReturn(json_encode([]));

        $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setLimit($limit)
          ->setOffset($offset)
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
        $this->sut = Cities::create($this->productionRequestHandler);

        $languageCodes = ['en'];
        $limit = mt_rand(1, 9);

        $cities = $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setLimit($limit)
          ->execute();

        $this->assertInternalType('array', $cities);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($cities);
        $this->assertTrue(count($cities) <= $limit);
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
