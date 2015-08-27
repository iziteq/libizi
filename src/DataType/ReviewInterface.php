<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ReviewInterface.
 */

namespace Triquanta\IziTravel\DataType;


interface ReviewInterface extends FactoryInterface, RevisionableInterface
{

    /**
     * Gets the id of the review.
     *
     * @return integer
     *   An integer id.
     */
    public function getId();

    /**
     * Gets the language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the rating.
     *
     * @return integer
     *   An integer with the rating from 0 to 10.
     */
    public function getRating();

    /**
     * Gets the (sanitized) review text.
     *
     * @return string
     *   Sanitized review text.
     */
    public function getReviewText();

    /**
     * Gets the (sanitized) name of the reviewer.
     *
     * @return mixed
     */
    public function getReviewName();

    /**
     * Gets the date and time of the review (in utc).
     *
     * @return string
     *   A string representation of the utc date.
     */
    public function getReviewDate();


}