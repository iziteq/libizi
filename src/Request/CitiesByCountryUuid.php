<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CitiesByCountryUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

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
        $json = $this->requestHandler->request('/countries/' . $this->uuid . '/cities',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'form' => $this->form,
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
