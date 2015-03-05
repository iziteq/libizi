<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullMtgObjectBase
 */
class FullMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "parent_uuid":       "3afcd4ab-837f-4055-a8ed-ce43910f9446",
  "hash":       "65dd8712d7b793b1a327fbef9e51a60d2a54ccdc",
  "type":       "story_navigation",
  "category":   "bike",
  "status":     "published",
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
  "content": [
    {
      "language":   "en",
      "title":      "Navigation Story",
      "summary":    "",
      "desc":       "",
      "playback": {
        "type": "sequential",
        "order": [
          "3afcd4ab-837f-4055-a8ed-ce43910f9446",
          "7b5092de-43f3-4762-9142-df30529f7942"
        ]
      },
      "images": [
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "audio": [
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "duration": 17,
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "duration": 17,
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "video": [
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "duration": 17,
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        },
        {
          "order": 1,
          "type":  "story",
            "hash" : "b638e89534de7a84304942ce7887bdb4",
            "duration": 17,
          "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
        }
      ],
      "quiz": {
        "question": "Dolor illo iure beatae inventore fuga voluptatem quam error.",
        "comment": "Bla bla bla",
        "answers": [
          {
            "content": "Qq",
            "correct": false
          },
          {
            "content": "Wow",
            "correct": false
          },
          {
            "content": "Eeey",
            "correct": true
          }
        ]
      }
    }
  ],
  "map": {
    "route": "48.80056018925834,2.128772735595703;48.79945774194329,...,2.129995822906494;48.80162021190271,2.129502296447754",
    "bounds": "48.795118387011776,2.118215560913086,48.809616,2.133493423461914"
  }
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullMtgObjectBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FullMtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($json, MultipleFormInterface::FORM_FULL);
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

        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getParentUuid
     */
    public function testGetParentUuid()
    {
        $this->assertSame('3afcd4ab-837f-4055-a8ed-ce43910f9446', $this->sut->getParentUuid());
    }

    /**
     * @covers ::getMap
     */
    public function testGetMap()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MapInterface', $this->sut->getMap());
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ContentInterface', $content);

        }
    }

}
