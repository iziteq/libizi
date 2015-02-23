<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Cities.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Requests cities.
 */
class Cities extends RequestBase implements FormInterface, LimitInterface, ModifiableInterface, MultilingualInterface
{

    use FormTrait;
    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CityInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/cities', [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
          'limit' => $this->limit,
          'offset' => $this->offset,
        ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            if ($this->form == MultipleFormInterface::FORM_COMPACT) {
                $cities[] = CompactCity::createFromData($cityData);
            } else {
                $cities[] = FullCity::createFromData($cityData);
            }
        }

        return $cities;
    }

}
