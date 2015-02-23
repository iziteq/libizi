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
     *
     * @dataProvider providerTestExecute
     */
    public function testExecute($type, $form, $instanceof)
    {
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
     * Provides data to self::testGetMtgObjects().
     */
    public function providerTestExecute()
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
