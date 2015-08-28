<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CitiesByCountryUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CityBase;

/**
 * Requests cities by country UUID.
 */
class CitiesByCountryUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CityInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/countries/' . $this->uuid . '/cities',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'form' => $this->form,
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
