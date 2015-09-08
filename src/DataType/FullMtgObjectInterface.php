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

    /**
     * Gets the sponsors
     *
     * @return \Triquanta\IziTravel\DataType\SponsorInterface[]
     */
    public function getSponsors();

    /**
     * Gets the location object
     *
     * @return \Triquanta\IziTravel\DataType\LocationInterface
     */
    public function getLocation();

    /**
     * Gets the contact information object.
     *
     * @return \Triquanta\IziTravel\DataType\ContactInformationInterface
     */
    public function getContactInformation();
}
