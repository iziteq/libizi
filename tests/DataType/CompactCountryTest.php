<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactCountryTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactCountry
 */
class CompactCountryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactCountry|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactCountry::createFromJson(TestHelper::getJsonResponse('country_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        CompactCountry::createFromJson(TestHelper::getJsonResponse('country_compact_include_all'),
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactCountry::createFromJson($json,
          MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('en', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame('Netherlands', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('De gekste!', $this->sut->getSummary());
    }

}
