<?php
/**
 * Created by PhpStorm.
 * User: jur
 * Date: 28/08/15
 * Time: 10:54
 */

namespace Triquanta\IziTravel\Request;


use Triquanta\IziTravel\Client\RequestHandlerInterface;
use Triquanta\IziTravel\DataType\ReviewPostableInterface;
use Triquanta\IziTravel\DataType\ReviewPostResponse;

class ReviewsPost extends RequestBase implements RequestInterface
{

    /**
     * @var ReviewPostableInterface
     */
    protected $review;

    public function setReview(ReviewPostableInterface $review) {
        $this->review = $review;
    }


    /**
     * @return \Triquanta\IziTravel\DataType\ReviewPostResponseInterface
     * @throws \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function execute()
    {
        $json = $this->requestHandler->post('/mtgobjects/' . $this->review->getContentUuid() . '/reviews',
            [
                'uuid' => $this->review->getContentUuid(),
                'content_type' => 'application/json',
            ],
            $this->review->getPostBody()
        );
        // The returned data is not the same as a rating.
        // However, the top level data is the same.
        // That's why we return this data object.
        $reviewPostResponse = ReviewPostResponse::createFromJson($json);
        return $reviewPostResponse;
    }
}