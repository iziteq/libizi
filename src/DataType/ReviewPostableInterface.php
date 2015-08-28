<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ReviewPostableInterface
 */

namespace Triquanta\IziTravel\DataType;


interface ReviewPostableInterface extends ReviewInterface, Postable
{

    /**
     * Gets the revision hash of the content.
     *
     * @return string
     */
    public function getContentHash();

    /**
     * Gets the content uuid.
     *
     * @return string
     */
    public function getContentUuid();


    /**
     * Sets the content uuid.
     *
     * @param string $contentUuid
     */
    public function setContentUuid($contentUuid);

    /**
     * Sets the revision hash of the content.
     *
     * @param string $hash
     */
    public function setContentHash($hash);

    /**
     * Sets the language of the review.
     *
     * @param string $language
     */
    public function setLanguage($language);

    /**
     * Sets the rating of the review.
     *
     * @param integer $rating
     */
    public function setRating($rating);

    /**
     * Sets the reviewtext of the review.
     *
     * @param string $reviewText
     */
    public function setReviewText($reviewText);

    /**
     * Sets the name of the reviewer.
     *
     * @param string $name
     */
    public function setReviewName($name);

}