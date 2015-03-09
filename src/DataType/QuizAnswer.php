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

    public static function createFromData(\stdClass $data)
    {
        $answer = new static();
        $answer->answer = $data->content;
        $answer->isCorrect = $data->correct;

        return $answer;
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
