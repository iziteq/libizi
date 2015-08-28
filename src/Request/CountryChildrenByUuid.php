<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CountryChildrenByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MtgObjectBase;
use Triquanta\IziTravel\DataType\MtgObjectInterface;

/**
 * Requests a country's children by UUID.
 */
class CountryChildrenByUuid extends RequestBase implements FormInterface, LimitInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * The content types.
     *
     * @var string[]
     *   An array of \Triquanta\IziTravel\DataType\MtgObjectInterface::TYPE_*
     *   constants, and/or "city", and/or "country".
     */
    protected $types = [
      MtgObjectInterface::TYPE_TOUR,
      MtgObjectInterface::TYPE_MUSEUM
    ];

    /**
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/countries/' . $this->uuid . '/children',
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'form' => $this->form,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'type' => $this->types,
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
     * Sets the requested content types.
     *
     * @param string[] $types
     *   An array of \Triquanta\IziTravel\DataType\MtgObjectInterface::TYPE_*
     *   constants.
     *
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;

        return $this;
    }

}
