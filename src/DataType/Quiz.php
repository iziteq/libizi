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

    /**
     * Creates a new instance.
     *
     * @param string $question
     * @param \Triquanta\IziTravel\DataType\QuizAnswerInterface[] $answers
     * @param string|null $comment
     */
    public function __construct($question, array $answers, $comment)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->comment = $comment;
    }

    public static function createFromData($data)
    {
        $data = (array) $data;
        $answers = [];
        foreach ($data['answers'] as $answer_data) {
            $answers[] = QuizAnswer::createFromData($answer_data);
        }
        return new static($data['question'], $answers, $data['comment']);
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
