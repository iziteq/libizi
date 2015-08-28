<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Cities.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CityBase;

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
        $json = $this->requestHandler->get('/cities', [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
          'limit' => $this->limit,
          'offset' => $this->offset,
        ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            $cities[] = CityBase::createFromJson(json_encode($cityData),
              $this->form);
        }

        return $cities;
    }

}
