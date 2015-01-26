<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\QuizAnswerTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\QuizAnswer;

/**
 * @coversDefaultClass \Triquanta\IziTravel\QuizAnswer
 */
class QuizAnswerTest extends \PHPUnit_Framework_TestCase {

  /**
   * The answer.
   *
   * @var string
   */
  protected $answer;

  /**
   * Whether the answer is correct.
   *
   * @var bool
   */
  protected $isCorrect;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\QuizAnswer
   */
  protected $sut;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    $this->answer = 'Foo Bar ' . mt_rand();
    $this->isCorrect = (bool) mt_rand(0, 1);

    $this->sut = new QuizAnswer($this->answer, $this->isCorrect);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   */
  public function testCreateFromJson() {
    $json = <<<'JSON'
{
  "content" : "Qq",
  "correct" : false
}
JSON;

    QuizAnswer::createFromJson($json);
  }

  /**
   * @covers ::__construct
   * @covers ::createFromJson
   *
   * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
   */
  public function testCreateFromJsonWithInvalidJson() {
    $json = 'foo';

    QuizAnswer::createFromJson($json);
  }

  /**
   * @covers ::getAnswer
   */
  public function testGetAnswer() {
    $this->assertSame($this->answer, $this->sut->getAnswer());
  }

  /**
   * @covers ::isCorrect
   */
  public function testIsCorrect() {
    $this->assertSame($this->isCorrect, $this->sut->isCorrect());
  }

}
