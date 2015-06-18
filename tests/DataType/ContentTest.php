<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\ContentTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Content;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Content
 */
class ContentTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "language":   "en",
  "title":      "Navigation Story",
  "summary":    "Cool story, bro!",
  "desc":       "Dit gaat toch helemaal nergens meer over...",
  "playback": {
    "type": "sequential",
    "order": [
      "3afcd4ab-837f-4055-a8ed-ce43910f9446",
      "7b5092de-43f3-4762-9142-df30529f7942"
    ]
  },
  "images": [
    {
      "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
      "type" : "brand_logo",
      "order" : 1,
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "size" : 5904
    },
    {
      "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
      "type" : "brand_logo",
      "order" : 1,
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "size" : 5904
    }
  ],
  "audio": [
    {
      "order": 1,
      "type":  "story",
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "duration": 13,
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    },
    {
      "order": 1,
      "type":  "story",
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "duration": 13,
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    }
  ],
  "video": [
    {
      "order": 1,
      "type":  "story",
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "duration": 13,
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    },
    {
      "order": 1,
      "type":  "story",
      "hash" : "3aec6365e75adadf44f87a52893e706e",
      "duration": 13,
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    }
  ],
  "children": [
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
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        },
        {
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        }
      ]
      }
  ],
  "collections": [
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
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        },
        {
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        }
      ]
      }
  ],
  "references": [
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
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        },
        {
          "uuid" : "a3f93ef2-5829-4115-becf-beda63db386a",
          "type" : "brand_logo",
          "order" : 1,
          "hash" : "3aec6365e75adadf44f87a52893e706e",
          "size" : 5904
        }
      ]
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
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Content
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Content::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Content::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        Content::createFromJson($json, MultipleFormInterface::FORM_FULL);
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
        $this->assertSame('Navigation Story', $this->sut->getTitle());
    }

    /**
     * @covers ::getSummary
     */
    public function testGetSummary()
    {
        $this->assertSame('Cool story, bro!', $this->sut->getSummary());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame('Dit gaat toch helemaal nergens meer over...',
          $this->sut->getDescription());
    }

    /**
     * @covers ::getPlayback
     */
    public function testGetPlayback()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\Playback',
          $this->sut->getPlayback());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ImageInterface',
              $image);
        }
    }

    /**
     * @covers ::getAudio
     */
    public function testGetAudio()
    {
        $this->assertInternalType('array', $this->sut->getAudio());
        foreach ($this->sut->getAudio() as $audio) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\AudioInterface',
              $audio);
        }
    }

    /**
     * @covers ::getVideos
     */
    public function testGetVideos()
    {
        $this->assertInternalType('array', $this->sut->getVideos());
        foreach ($this->sut->getVideos() as $video) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\VideoInterface',
              $video);
        }
    }

    /**
     * @covers ::getChildren
     */
    public function testGetChildren()
    {
        $this->assertInternalType('array', $this->sut->getChildren());
        foreach ($this->sut->getChildren() as $object) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MtgObjectInterface',
              $object);
        }
    }

    /**
     * @covers ::getCollections
     */
    public function testGetCollections()
    {
        $this->assertInternalType('array', $this->sut->getCollections());
        foreach ($this->sut->getCollections() as $object) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MtgObjectInterface',
              $object);
        }
    }

    /**
     * @covers ::getReferences
     */
    public function testGetReferences()
    {
        $this->assertInternalType('array', $this->sut->getReferences());
        foreach ($this->sut->getReferences() as $object) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MtgObjectInterface',
              $object);
        }
    }

    /**
     * @covers ::getQuiz
     */
    public function testGetQuiz()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\QuizInterface',
          $this->sut->getQuiz());
    }

}
