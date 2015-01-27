<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\QuizInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a quiz data type.
 */
interface QuizInterface extends FactoryInterface
{

    /**
     * Gets the question.
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Gets the comment.
     *
     * @return string|null
     */
    public function getComment();

    /**
     * Gets the suggested answers.
     *
     * @return \Triquanta\IziTravel\DataType\QuizAnswerInterface[]
     */
    public function getAnswers();

}
