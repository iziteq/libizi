<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Quiz.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * provides a quiz data type.
 */
class Quiz implements QuizInterface
{

    use FactoryTrait;

    /**
     * The suggested answers.
     *
     * @var \Triquanta\IziTravel\DataType\QuizAnswerInterface[]
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

    public static function createFromData(\stdClass $data)
    {
        $quiz = new static();
        $quiz->question = $data->question;
        foreach ($data->answers as $answerData) {
            $quiz->answers[] = QuizAnswer::createFromData($answerData);
        }
        if (isset($data->comment)) {
            $quiz->comment = $data->comment;
        }

        return $quiz;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

}
