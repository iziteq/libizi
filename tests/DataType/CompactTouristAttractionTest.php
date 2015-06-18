<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactTouristAttractionTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactTouristAttraction;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactTouristAttraction
 */
class CompactTouristAttractionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactTouristAttraction|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactTouristAttraction::createFromJson(TestHelper::getJsonResponse('tourist_attraction_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CompactTouristAttraction::createFromJson(TestHelper::getJsonResponse('tourist_attraction_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactTouristAttraction::createFromJson($json,
          MultipleFormInterface::FORM_COMPACT);
    }

}
