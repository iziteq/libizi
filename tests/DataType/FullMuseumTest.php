<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullMuseumTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullMuseum;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullMuseum
 */
class FullMuseumTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullMuseum
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullMuseum::createFromJson(TestHelper::getJsonResponse('museum_full_include_all'), MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        FullMuseum::createFromJson(TestHelper::getJsonResponse('museum_full_include_all'), MultipleFormInterface::FORM_FULL);
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

        FullMuseum::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

        FullMuseum::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getSchedule
     */
    public function testGetSchedule()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ScheduleInterface', $this->sut->getSchedule());
    }

}
