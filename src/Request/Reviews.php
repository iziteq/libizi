<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Reviews.
 */

namespace Triquanta\IziTravel\Request;


use Triquanta\IziTravel\DataType\Rating;

class Reviews extends RequestBase implements LimitInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\RatingInterface
     */
    public function execute()
    {
        // @todo: create unit test
        $json = $this->requestHandler->request(
          '/mtgobjects/'.$this->uuid.'/reviews',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'limit' => $this->limit,
            'offset' => $this->offset,
          ]
        );
        $rating = Rating::createFromJson($json);

        return $rating;
    }
}