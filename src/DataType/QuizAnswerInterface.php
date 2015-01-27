<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\QuizAnswerInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a quiz answer data type.
 */
interface QuizAnswerInterface extends FactoryInterface
{

    /**
     * Gets the answer.
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Gets whether the answer is correct.
     *
     * @return bool
     */
    public function isCorrect();

}
