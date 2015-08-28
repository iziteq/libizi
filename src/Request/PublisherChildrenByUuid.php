<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\PublisherByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MtgObjectBase;

/**
 * Requests a publisher's children by UUID.
 */
class PublisherChildrenByUuid extends RequestBase implements FormInterface, LimitInterface, ModifiableInterface, MultilingualInterface, UuidInterface
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
        $json = $this->requestHandler->get('/mtg/publishers/' . $this->uuid . '/children',
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
            $objects[] = MtgObjectBase::createFromJson(json_encode($objectData),
              $this->form);
        }

        return $objects;
    }

}
