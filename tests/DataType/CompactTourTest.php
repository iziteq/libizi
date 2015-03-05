<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactTourTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactTour;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactTour
 */
class CompactTourTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "hash":       "65dd8712d7b793b1a327fbef9e51a60d2a54ccdc",
  "type":       "tour",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "category":   "bike",
  "status":     "published",
  "duration":   123,
  "distance":   123,
  "placement":  "outdoor",
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
  ],
  "route": "48.80056018925834,2.128772735595703;48.79945774194329,...,2.129995822906494;48.80162021190271,2.129502296447754"
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactTour|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactTour::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CompactTour::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
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

        CompactTour::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
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
{}
JSON;

        CompactTour::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::getRoute
     */
    public function testGetRoute()
    {
        $this->assertSame('48.80056018925834,2.128772735595703;48.79945774194329,...,2.129995822906494;48.80162021190271,2.129502296447754', $this->sut->getRoute());
    }

}
