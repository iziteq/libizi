<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMuseumInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a full museum data type.
 */
interface FullMuseumInterface extends MuseumInterface, FullMtgObjectInterface
{

    /**
     * Gets the schedule.
     *
     * @return \Triquanta\IziTravel\DataType\ScheduleInterface|null
     */
    public function getSchedule();

}
