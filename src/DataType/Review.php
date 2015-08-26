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
    protected $language_code;

    /**
     * The hash.
     *
     * @var string
     */
    protected $hash;

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
    protected $review_text;

    /**
     * The name of the reviewer.
     *
     * @var string
     */
    protected $review_name;

    /**
     * The date of the review.
     *
     * @var string
     */
    protected $review_date;



    use FactoryTrait;

    public static function createFromData(\stdClass $data)
    {
        $review = new static();
        $review->id = $data->id;
        $review->language_code = $data->lang;
        $review->hash = $data->hash;
        $review->rating = $data->rating;
        $review->review_text = $data->review;
        $review->review_name = $data->reviewer_name;
        $review->review_date = $data->date;

        return $review;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLanguageCode()
    {
        return $this->language_code;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getReviewText()
    {
        return strip_tags($this->review_text);
    }

    public function getReviewName()
    {
        return strip_tags($this->review_name);
    }

    public function getReviewDate()
    {
        return $this->review_date;
    }

}