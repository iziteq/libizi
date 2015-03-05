<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullMuseumTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullMuseum;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullMuseum
 */
class FullMuseumTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
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
  "schedule" : {
      "mon" : ["10:00", "18:00"],
      "tue" : ["10:00", "18:00"],
      "wed" : ["10:00", "18:00"],
      "thu" : ["10:00", "18:00"],
      "fri" : ["10:00", "18:00"],
      "sat" : ["11:00", "17:00"],
      "sun" : ["11:00", "15:00"]
    }
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullMuseum
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullMuseum::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        FullMuseum::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        FullMuseum::createFromJson($json, MultipleFormInterface::FORM_FULL);
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
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

        FullMuseum::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getSchedule
     */
    public function testGetSchedule()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ScheduleInterface', $this->sut->getSchedule());
    }

}
