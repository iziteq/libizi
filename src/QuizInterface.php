<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\QuizInterface.
 */

namespace Triquanta\IziTravel;

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
     * @return \Triquanta\IziTravel\QuizAnswerInterface[]
     */
    public function getAnswers();

}
