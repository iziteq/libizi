<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\QuizAnswer.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a quiz answer data type.
 */
class QuizAnswer implements QuizAnswerInterface {

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
   * Creates a new instance.
   *
   * @param string $answer
   * @param bool $is_correct
   */
  public function __construct($answer, $is_correct) {
    $this->answer = $answer;
    $this->isCorrect = $is_correct;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data;
    return new static($data['content'], $data['correct']);
  }

  /**
   * {@inheritdoc}
   */
  public function getAnswer() {
    return $this->answer;
  }

  /**
   * {@inheritdoc}
   */
  public function isCorrect() {
    return $this->isCorrect;
  }

}
