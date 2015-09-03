<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ReviewPostResponseInterface
 */

namespace Triquanta\IziTravel\DataType;


interface ReviewPostResponseInterface extends FactoryInterface
{

    /**
     * Get the uuid of the object which is rated/reviewed.
     *
     * @return string
     *   The uuid of the rated object, not of the ratings itself!
     */
    public function getUuid();

    /**
     * Gets the review which just has been posted.
     *
     * @return \Triquanta\IziTravel\DataType\Review[]
     *   All the reviews belonging to this rating.
     */
    public function getPostedReview();
}