<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\FeaturedContent.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\FeaturedCity;
use Triquanta\IziTravel\DataType\FeaturedMuseum;
use Triquanta\IziTravel\DataType\FeaturedTour;

/**
 * Requests featured content.
 */
class FeaturedContent extends RequestBase implements MultilingualInterface
{

    use MultilingualTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\FeaturedContentInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/featured/', [
          'languages' => $this->languageCodes,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            if ($objectData->type == 'museum') {
                $objects[] = FeaturedMuseum::createFromData($objectData, null);
            } elseif ($objectData->type == 'tour') {
                $objects[] = FeaturedTour::createFromData($objectData, null);
            } elseif ($objectData->type == 'city') {
                $objects[] = FeaturedCity::createFromData($objectData, null);
            }
        }

        return $objects;
    }

}
