<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Reviews.
 */

namespace Triquanta\IziTravel\Request;


use Triquanta\IziTravel\DataType\RatingReviews;

class Reviews extends RequestBase implements LimitInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\RatingReviewsInterface
     */
    public function execute()
    {
        // @todo: create unit test
        $json = $this->requestHandler->get(
          '/mtgobjects/'.$this->uuid.'/reviews',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'limit' => $this->limit,
            'offset' => $this->offset,
          ]
        );
        $rating = RatingReviews::createFromJson($json);

        return $rating;
    }
}
