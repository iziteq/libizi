<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CountryByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Requests a country by UUID.
 */
class CountryByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CountryInterface
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/countries/' . $this->uuid, [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);
        $data = json_decode($json);
        if ($this->form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCountry::createFromData($data);
        } else {
            return FullCountry::createFromData($data);
        }
    }

}
