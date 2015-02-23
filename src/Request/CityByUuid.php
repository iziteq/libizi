<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CityByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Requests a city by UUID.
 */
class CityByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CityInterface
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/cities/' . $this->uuid, [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);
        $data = json_decode($json);
        if ($this->form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCity::createFromData($data);
        } else {
            return FullCity::createFromData($data);
        }
    }

}
