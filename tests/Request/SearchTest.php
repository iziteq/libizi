<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\SearchTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\Search;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\Search
 */
class SearchTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\Search
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = Search::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = Search::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     * @covers ::setQuery
     * @covers ::setRegion
     * @covers ::setSort
     * @covers ::setTypes
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
        $query = '';
        $limit = mt_rand();
        $offset = mt_rand();
        $formOptions = [
          MultipleFormInterface::FORM_COMPACT,
          MultipleFormInterface::FORM_FULL
        ];
        $form = $formOptions[array_rand($formOptions)];
        $typesOptions = [
          MtgObjectInterface::TYPE_MUSEUM,
          MtgObjectInterface::TYPE_TOUR,
          'city',
          'museum'
        ];
        $types = [$typesOptions[array_rand($typesOptions)]];
        $regionOptions = [
          'bcf57367-77f6-4e39-9da6-1b481826501f',
          '3f879f37-21b0-479d-bd74-aa26f72fa328'
        ];
        $region = $regionOptions[array_rand($regionOptions)];
        $includesOptions = ['city', 'country'];
        $includes = [$includesOptions[array_rand($includesOptions)]];
        $sortFieldOptions = ['popularity', 'title'];
        $sortField = $sortFieldOptions[array_rand($sortFieldOptions)];
        $sortOrderOptions = ['popularity', 'title'];
        $sortOrder = $sortOrderOptions[array_rand($sortOrderOptions)];

        $expectedParameters = [
          'languages' => $languageCodes,
          'includes' => $includes,
          'form' => $form,
          'sort_by' => $sortField . ':' . $sortOrder,
          'type' => $types,
          'query' => $query,
          'limit' => $limit,
          'offset' => $offset,
          'region' => $region,
        ];

        $this->requestHandler->expects($this->once())
          ->method('get')
          ->with($this->isType('string'),
            new \PHPUnit_Framework_Constraint_IsEqual($expectedParameters))
          ->willReturn(json_encode([]));

        $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setQuery($query)
          ->setLimit($limit)
          ->setOffset($offset)
          ->setTypes($types)
          ->setRegion($region)
          ->setIncludes($includes)
          ->setSort($sortField, $sortOrder)
          ->execute();

    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecuteRealRequest
     *
     * @depends      testExecute
     */
    public function testExecuteRealRequest($type, $form, $instanceof)
    {
        $this->sut = Search::create($this->productionRequestHandler);

        $languageCodes = ['en'];
        $query = '';
        $limit = mt_rand(1, 9);

        $mtgObjects = $this->sut->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->setQuery($query)
          ->setLimit($limit)
          ->setTypes([$type])
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
     * Provides data to self::testExecuteRealRequest().
     */
    public function providerTestExecuteRealRequest()
    {
        return [
          [
            MtgObjectInterface::TYPE_TOUR,
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_TOUR,
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_TOURIST_ATTRACTION,
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_TOURIST_ATTRACTION,
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_MUSEUM,
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_MUSEUM,
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_EXHIBIT,
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_EXHIBIT,
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_STORY_NAVIGATION,
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
          [
            MtgObjectInterface::TYPE_STORY_NAVIGATION,
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            'city',
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactCityInterface'
          ],
          [
            'city',
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullCityInterface'
          ],
          [
            'country',
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactCountryInterface'
          ],
          [
            'country',
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullCountryInterface'
          ],
        ];
    }

}
