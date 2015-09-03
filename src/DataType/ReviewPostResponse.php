<?php
/**
 * Created by PhpStorm.
 * User: jur
 * Date: 03/09/15
 * Time: 11:51
 */

namespace Triquanta\IziTravel\DataType;

use \Triquanta\IziTravel\DataType\Review;

class ReviewPostResponse implements ReviewPostResponseInterface
{
    use FactoryTrait;

    /**
     * The uuid.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The posted review.
     *
     * @var \Triquanta\IziTravel\DataType\Review
     */
    protected $postedReview;

    public static function createFromData(\stdClass $data)
    {
        $reviewPostResonse = new static();
        $reviewPostResonse->uuid = $data->metadata->uuid;

        if (isset($data->data)) {
            $reviewPostResonse->postedReview = Review::createFromJson(json_encode($data->data[0]));
        }

        return $reviewPostResonse;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getPostedReview()
    {
        return $this->postedReview;
    }
}