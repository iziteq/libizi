<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\FullMtgObjectInterface.
 */

namespace Triquanta\IziTravel;

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
     * Gets the schedule.
     *
     * @return \Triquanta\IziTravel\ScheduleInterface|null
     */
    public function getSchedule();

    /**
     * Gets the contact information.
     *
     * @return \Triquanta\IziTravel\ContactInformationInterface|null
     */
    public function getContactInformation();

    /**
     * Gets the map.
     *
     * @return \Triquanta\IziTravel\MapInterface|null
     */
    public function getMap();

    /**
     * Gets the content.
     *
     * @return \Triquanta\IziTravel\ContentInterface[]
     */
    public function getContent();

}
