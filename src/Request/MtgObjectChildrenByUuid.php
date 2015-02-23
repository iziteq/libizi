<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MtgObjectChildrenByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MtgObjectBase;

/**
 * Requests a MtgObject's children by UUID.
 */
class MtgObjectChildrenByUuid extends RequestBase implements FormInterface, LimitInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/mtgobjects/' . $this->uuid . '/children',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'form' => $this->form,
            'limit' => $this->limit,
            'offset' => $this->offset,
          ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = MtgObjectBase::createMtgObject($objectData,
              $this->form);
        }

        return $objects;
    }

}
