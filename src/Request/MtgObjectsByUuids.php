<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MtgObjectsByUuids.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MtgObjectBase;

/**
 * Requests an MTGObject by UUID.
 */
class MtgObjectsByUuids extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;

    /**
     * The UUIDs.
     *
     * @var string[]
     */
    protected $uuids = [];

    /**
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/mtgobjects/batch/' . implode(',',
            $this->uuids), [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = MtgObjectBase::createFromJson(json_encode($objectData),
              $this->form);
        }

        return $objects;
    }

    /**
     * Sets the UUIDs.
     *
     * @param string[] $uuids
     *
     * @return $this
     */
    public function setUuids(array $uuids)
    {
        $this->uuids = $uuids;

        return $this;
    }

}
