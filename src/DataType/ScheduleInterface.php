<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ScheduleInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a schedule data type.
 */
interface ScheduleInterface extends FactoryInterface
{

    /**
     * Gets Monday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getMondaySchedule();

    /**
     * Gets Tuesday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getTuesdaySchedule();

    /**
     * Gets Wednesday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getWednesdaySchedule();

    /**
     * Gets Thursday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getThursdaySchedule();

    /**
     * Gets Friday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getFridaySchedule();

    /**
     * Gets Saturday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getSaturdaySchedule();

    /**
     * Gets Sunday's opening hours.
     *
     * @return string[]|null
     *   An array of opening and closing hours respectively, in a 24-hour format,
     *   or NULL if the venue is closed.
     */
    public function getSundaySchedule();

}
