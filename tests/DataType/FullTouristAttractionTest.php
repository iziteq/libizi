<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullTouristAttractionTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullTouristAttraction;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullTouristAttraction
 */
class FullTouristAttractionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullTouristAttraction|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullTouristAttraction::createFromJson(TestHelper::getJsonResponse('tourist_attraction_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        FullTouristAttraction::createFromJson(TestHelper::getJsonResponse('tourist_attraction_full_include_all'),
          MultipleFormInterface::FORM_FULL);
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

        FullTouristAttraction::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

}
