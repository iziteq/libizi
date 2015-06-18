<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullCountryTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullCountry
 */
class FullCountryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullCountry|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullCountry::createFromJson(TestHelper::getJsonResponse('country_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\CountryBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        FullCountry::createFromJson(TestHelper::getJsonResponse('country_full_include_all'),
          MultipleFormInterface::FORM_FULL);
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

        FullCountry::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryContentInterface',
              $content);
        }
    }

}
