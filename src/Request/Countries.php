<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Countries.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

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
        $json = $this->requestHandler->request('/countries', [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
          'limit' => $this->limit,
          'offset' => $this->offset,
        ]);
        $data = json_decode($json);
        $Countries = [];
        foreach ($data as $countryData) {
            if ($this->form == MultipleFormInterface::FORM_COMPACT) {
                $Countries[] = CompactCountry::createFromData($countryData);
            } else {
                $Countries[] = FullCountry::createFromData($countryData);
            }
        }

        return $Countries;
    }

}
