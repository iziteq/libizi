<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\RatingInterface
 */

namespace Triquanta\IziTravel\DataType;


interface RatingReviewsInterface extends FactoryInterface, PagingInterface
{

    /**
     * Get the uuid of the object which is rated/reviewed.
     *
     * @return string
     *   The uuid of the rated object, not of the ratings itself!
     */
    public function getUuid();

    /**
     * Get the rating average.
     *
     * @return float
     *   The calculated rating average.
     */
    public function getRatingAverage();

    /**
     * Get the ratings count.
     *
     * @return integer
     *   Total number of ratings at average snapshot time (across all languages)
     */
    public function getRatingsCount();

    /**
     * Get the reviews count.
     *
     * @return integer
     *   Total number of reviews at average snapshot time (across all languages)
     */
    public function getReviewsCount();

    /**
     * Gets the utc time when the average was calculated.
     *
     * @return string
     *   UTC time when average was calculated. Format is according to ISO-8601 “YYYY-MM-DDThh:mm:ssZ”
     */
    public function getDate();

    /**
     * Gets all the reviews belonging to this rating.
     *
     * @return \Triquanta\IziTravel\DataType\Review[]
     *   All the reviews belonging to this rating.
     */
    public function getReviews();

}