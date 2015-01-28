<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\QuizAnswer.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a quiz answer data type.
 */
class QuizAnswer implements QuizAnswerInterface
{

    use FactoryTrait;

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
     * @param bool $isCorrect
     */
    public function __construct($answer, $isCorrect)
    {
        $this->answer = $answer;
        $this->isCorrect = $isCorrect;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;
        return new static($data['content'], $data['correct']);
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function isCorrect()
    {
        return $this->isCorrect;
    }

}
