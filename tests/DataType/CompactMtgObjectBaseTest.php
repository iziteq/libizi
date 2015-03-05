<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactMtgObjectBase
 */
class CompactMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "hash":       "65dd8712d7b793b1a327fbef9e51a60d2a54ccdc",
  "type":       "story_navigation",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "category":   "bike",
  "status":     "published",
  "language": "en",
  "languages":  ["en"],
  "content_provider": {
    "name": "Sample CP",
    "uuid": "15ad4ee2-ff55-4a86-950d-8dee4c79fc35"
  },
  "trigger_zones": [
    {
      "type":             "circle",
      "circle_latitude":  52.4341477399124,
      "circle_longitude": 4.81567904827443,
      "circle_radius":    818.92609425069
    }
  ],
  "location": {
    "altitude":  0.0,
    "latitude":  59.9308144003772,
    "longitude": 30.3516736220902
  },
  "images": [
    {
        "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
        "type" : "story",
        "order" : 1,
        "hash" : "b638e89534de7a84304942ce7887bdb4",
        "size" : 231663
      },
      {
        "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
        "type" : "story",
        "order" : 1,
        "hash" : "b638e89534de7a84304942ce7887bdb4",
        "size" : 231663
      }
  ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CompactMtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     */
    public function testCreateFromJson()
    {


        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
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

        /** @var \Triquanta\IziTravel\DataType\CompactMtgObjectBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
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
        $this->assertSame('Foo to the bar', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('A story about foo to the bar.', $this->sut->getSummary());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ImageInterface', $image);
        }
    }

}
