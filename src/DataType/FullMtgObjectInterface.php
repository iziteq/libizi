<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMtgObjectInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a full MTG object data type.
 */
interface FullMtgObjectInterface extends MtgObjectInterface
{

    /**
     * Gets the UUID of the parent object.
     *
     * @return string|null
     */
    public function getParentUuid();

    /**
     * Gets the contact information.
     *
     * @return \Triquanta\IziTravel\DataType\ContactInformationInterface|null
     */
    public function getContactInformation();

    /**
     * Gets the map.
     *
     * @return \Triquanta\IziTravel\DataType\MapInterface|null
     */
    public function getMap();

    /**
     * Gets the content.
     *
     * @return \Triquanta\IziTravel\DataType\ContentInterface[]
     */
    public function getContent();

}
