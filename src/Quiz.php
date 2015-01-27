<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Quiz.
 */

namespace Triquanta\IziTravel;

/**
 * provides a quiz data type.
 */
class Quiz implements QuizInterface
{

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
     * Creates a new instance.
     *
     * @param string $question
     * @param \Triquanta\IziTravel\QuizAnswerInterface[] $answers
     * @param string|null $comment
     */
    public function __construct($question, array $answers, $comment)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->comment = $comment;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data;
        $answers = [];
        foreach ($data['answers'] as $answer_data) {
            $answers[] = QuizAnswer::createFromJson(json_encode($answer_data));
        }
        return new static($data['question'], $answers, $data['comment']);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * {@inheritdoc}
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * {@inheritdoc}
     */
    public function getAnswers()
    {
        return $this->answers;
    }

}
