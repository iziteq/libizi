<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryContent;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryContent
 */
class CountryContentTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "title": "Netherlands",
  "summary": "Poehee",
  "desc": "Het is vandaag woensdag.",
  "language": "en"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CountryContent
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CountryContent::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CountryContent::createFromJson($this->json,
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

        CountryContent::createFromJson($json, MultipleFormInterface::FORM_FULL);
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
        $this->assertSame('Poehee', $this->sut->getSummary());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame('Het is vandaag woensdag.',
          $this->sut->getDescription());
    }

}
