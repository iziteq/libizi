<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryContent;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryContent
 */
class CountryContentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The language code.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @var string
     */
    protected $title;

    /**
     * The summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * The description.
     *
     * @var string
     */
    protected $description;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CountryContent
     */
    protected $sut;

    public function setUp()
    {
        $this->languageCode = 'uk';

        $this->title = 'Foo & Bar ' . mt_rand();

        $this->summary = 'The story of Foo & Bar ' . mt_rand();

        $this->description = 'A description of the story of Foo & Bar ' . mt_rand();

        $this->sut = new CountryContent($this->languageCode, $this->title,
          $this->summary, $this->description);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "title": "Netherlands",
  "summary": "",
  "desc": "",
  "language": "en"
}
JSON;

        CountryContent::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CountryContent::createFromJson($json);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame($this->title, $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame($this->summary, $this->sut->getSummary());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame($this->description, $this->sut->getDescription());
    }

}
