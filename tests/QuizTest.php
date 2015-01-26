<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\QuizTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\Quiz;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Quiz
 */
class QuizTest extends \PHPUnit_Framework_TestCase {

  /**
   * The suggested answers.
   *
   * @var \Triquanta\IziTravel\QuizAnswerInterface[]
   */
  protected $answers = [];

  /**
   * The comment.
   *
   * @var string|null
   */
  protected $comment;

  /**
   * The question.
   *
   * @var string
   */
  protected $question;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\Quiz
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->question = 'Foo Qux?';
    $this->comment = 'Foo Qux!';
    $this->answers = [
      $this->getMock('\Triquanta\IziTravel\QuizAnswerInterface'),
      $this->getMock('\Triquanta\IziTravel\QuizAnswerInterface'),
    ];

    $this->sut = new Quiz($this->question, $this->answers, $this->comment);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
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
] }
JSON;

    Quiz::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    Quiz::createFromJson($json);
  }

  /**
   * @covers ::getQuestion
   */
  public function testGetQuestion() {
    $this->assertSame($this->question, $this->sut->getQuestion());
  }

  /**
   * @covers ::getAnswers
   */
  public function testGetAnswers() {
    $this->assertSame($this->answers, $this->sut->getAnswers());
  }

  /**
   * @covers ::getComment
   */
  public function testGetComment() {
    $this->assertSame($this->comment, $this->sut->getComment());
  }

}
