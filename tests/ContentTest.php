<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\ContentTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\Content;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Content
 */
class ContentTest extends \PHPUnit_Framework_TestCase {

  /**
   * The language.
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
   * The description
   *
   * @var string
   */
  protected $description;

  /**
   * The playback.
   *
   * @var \Triquanta\IziTravel\PlaybackInterface|null
   */
  protected $playback;

  /**
   * The images.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $images = [];

  /**
   * The audio media.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $audio = [];

  /**
   * The videos.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $videos = [];

  /**
   * The quiz.
   *
   * @var \Triquanta\IziTravel\QuizInterface|null
   */
  protected $quiz;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\Content
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->languageCode = 'fo';
    $this->title = 'Foo Baz Bar';
    $this->summary = 'Qux.';
    $this->description = 'Qux & Bar.';
    $this->playback = $this->getMock('\Triquanta\IziTravel\PlaybackInterface');
    $this->images = [$this->getMock('\Triquanta\IziTravel\MediaInterface'), $this->getMock('\Triquanta\IziTravel\MediaInterface')];
    $this->audio = [$this->getMock('\Triquanta\IziTravel\MediaInterface'), $this->getMock('\Triquanta\IziTravel\MediaInterface')];
    $this->videos = [$this->getMock('\Triquanta\IziTravel\MediaInterface'), $this->getMock('\Triquanta\IziTravel\MediaInterface')];
    $this->quiz = $this->getMock('\Triquanta\IziTravel\QuizInterface');

    $this->sut = new Content($this->languageCode, $this->title, $this->summary, $this->description, $this->playback, $this->images, $this->audio, $this->videos, $this->quiz);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
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
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    },
    {
      "order": 1,
      "type":  "story",
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    }
  ],
  "audio": [
    {
      "order": 1,
      "type":  "story",
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    },
    {
      "order": 1,
      "type":  "story",
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    }
  ],
  "video": [
    {
      "order": 1,
      "type":  "story",
      "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
    },
    {
      "order": 1,
      "type":  "story",
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
JSON;

    Content::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    Content::createFromJson($json);
  }

  /**
   * @covers ::getLanguageCode
   */
  public function testGetLanguageCode() {
    $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
  }

  /**
   * @covers ::getTitle
   */
  public function testGetTitle() {
    $this->assertSame($this->title, $this->sut->getTitle());
  }

  /**
   * @covers ::getSummary
   */
  public function testGetSummary() {
    $this->assertSame($this->summary, $this->sut->getSummary());
  }

  /**
   * @covers ::getDescription
   */
  public function testGetDescription() {
    $this->assertSame($this->description, $this->sut->getDescription());
  }

  /**
   * @covers ::getPlayback
   */
  public function testGetPlayback() {
    $this->assertSame($this->playback, $this->sut->getPlayback());
  }

  /**
   * @covers ::getImages
   */
  public function testGetImages() {
    $this->assertSame($this->images, $this->sut->getImages());
  }

  /**
   * @covers ::getAudio
   */
  public function testGetAudio() {
    $this->assertSame($this->audio, $this->sut->getAudio());
  }

  /**
   * @covers ::getVideos
   */
  public function testGetVideos() {
    $this->assertSame($this->videos, $this->sut->getVideos());
  }

  /**
   * @covers ::getQuiz
   */
  public function testGetQuiz() {
    $this->assertSame($this->quiz, $this->sut->getQuiz());
  }

}
