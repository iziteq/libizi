<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryCityTranslationTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryCityTranslation;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryCityTranslation
 */
class CountryCityTranslationTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "name": "foo_bar",
  "language":  "UK"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CountryCityTranslation
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CountryCityTranslation::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CountryCityTranslation::createFromJson($this->json,
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

        CountryCityTranslation::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertSame('foo_bar', $this->sut->getName());
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('UK', $this->sut->getLanguageCode());
    }

}
