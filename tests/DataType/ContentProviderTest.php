<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\ContentProviderTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\ContentProvider;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\ContentProvider
 */
class ContentProviderTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "name": "Sample CP",
  "uuid": "15ad4ee2-ff55-4a86-950d-8dee4c79fc35",
  "copyright": "Here be dragons."
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProvider
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = ContentProvider::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        ContentProvider::createFromJson($this->json,
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

        ContentProvider::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getUuid
     */
    public function testGetUuid()
    {
        $this->assertSame('15ad4ee2-ff55-4a86-950d-8dee4c79fc35',
          $this->sut->getUuid());
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertSame('Sample CP', $this->sut->getName());
    }

    /**
     * @covers ::getCopyrightMessage
     */
    public function testGetCopyrightMessage()
    {
        $this->assertSame('Here be dragons.',
          $this->sut->getCopyrightMessage());
    }

}
