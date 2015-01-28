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
     * @param bool $is_correct
     */
    public function __construct($answer, $is_correct)
    {
        $this->answer = $answer;
        $this->isCorrect = $is_correct;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;
        return new static($data['content'], $data['correct']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * {@inheritdoc}
     */
    public function isCorrect()
    {
        return $this->isCorrect;
    }

}
