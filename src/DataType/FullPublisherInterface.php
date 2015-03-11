<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a compact publisher data type.
 */
interface FullPublisherInterface extends PublisherInterface
{

    /**
     * Gets the content.
     *
     * @return \Triquanta\IziTravel\DataType\PublisherContentInterface[]
     */
    public function getContent();

    /**
     * Gets the contact information.
     *
     * @return \Triquanta\IziTravel\DataType\PublisherContactInformationInterface
     */
    public function getContactInformation();

}
