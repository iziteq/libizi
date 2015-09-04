<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Reviews.
 */

namespace Triquanta\IziTravel\Request;


use Triquanta\IziTravel\DataType\RatingReviews;

class Reviews extends RequestBase implements LimitInterface, ModifiableInterface, UuidInterface, ReviewsRequestInterface
{

    use LimitTrait;
    use ModifiableTrait;
    use UuidTrait;

    /** @var  string */
    protected $language;

    /**
     * @return \Triquanta\IziTravel\DataType\RatingReviewsInterface
     */
    public function execute()
    {
        // @todo: create unit test
        $json = $this->requestHandler->get(
          '/mtgobjects/'.$this->uuid.'/reviews',
          [
            'lang' => $this->language,
            'includes' => $this->includes,
            'limit' => $this->limit,
            'offset' => $this->offset,
          ]
        );
        $rating = RatingReviews::createFromJson($json);

        return $rating;
    }

    /**
     * Set the language in which the reviews should be retrieved.
     *
     * @param $language
     *
     * @return $this;
     */
    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }

}
