<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMuseum.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full museum data type.
 */
class FullMuseum extends FullMtgObjectBase implements FullMuseumInterface
{

    /**
     * The schedule.
     *
     * @var \Triquanta\IziTravel\DataType\ScheduleInterface|null
     */
    protected $schedule;

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $museum */
        $museum = parent::createFromData($data, $form);
        if (isset($data->schedule)) {
            $museum->schedule = Schedule::createFromData($data->schedule, $form);
        }

        return $museum;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

}
