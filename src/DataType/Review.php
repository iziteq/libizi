<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Review
 */

namespace Triquanta\IziTravel\DataType;

/**
 * @todo: create unit test.
 *
 * Class Review
 * @package Triquanta\IziTravel\DataType
 */
class Review implements ReviewInterface
{

    /**
     * The id.
     *
     * @var integer
     */
    protected $id;

    /**
     * The language code.
     *
     * @var string
     */
    protected $languageCode;

    /**
     * The rating
     *
     * @var integer
     */
    protected $rating;

    /**
     *  The review itself.
     *
     * @var string
     */
    protected $reviewText;

    /**
     * The name of the reviewer.
     *
     * @var string
     */
    protected $reviewName;

    /**
     * The date of the review.
     *
     * @var string
     */
    protected $reviewDate;



    use FactoryTrait;

    use RevisionableTrait;

    public static function createFromData(\stdClass $data)
    {
        $review = new static();
        $review->id = $data->id;
        $review->languageCode = $data->lang;
        $review->revisionHash = $data->hash;
        $review->rating = $data->rating;
        $review->reviewText = $data->review;
        $review->reviewName = $data->reviewer_name;
        $review->reviewDate = $data->date;

        return $review;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getReviewText()
    {
        return strip_tags($this->reviewText);
    }

    public function getReviewName()
    {
        return strip_tags($this->reviewName);
    }

    public function getReviewDate()
    {
        return $this->reviewDate;
    }

}