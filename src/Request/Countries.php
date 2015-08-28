<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Countries.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CountryBase;

/**
 * Requests Countries.
 */
class Countries extends RequestBase implements FormInterface, LimitInterface, ModifiableInterface, MultilingualInterface
{

    use FormTrait;
    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/countries', [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
          'limit' => $this->limit,
          'offset' => $this->offset,
        ]);
        $data = json_decode($json);
        $countries = [];
        foreach ($data as $countryData) {
            $countries[] = CountryBase::createFromJson(json_encode($countryData),
              $this->form);
        }

        return $countries;
    }

}
