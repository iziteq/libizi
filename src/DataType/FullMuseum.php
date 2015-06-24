<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMuseum.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full museum data type.
 */
class FullMuseum extends FullMtgObjectBase implements FullMuseumInterface
{

    use PaidDataTrait;

    /**
     * The schedule.
     *
     * @var \Triquanta\IziTravel\DataType\ScheduleInterface|null
     */
    protected $schedule;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/museum_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $museum */
        $museum = parent::createFromData($data);
        if (isset($data->schedule)) {
            $museum->schedule = Schedule::createFromData($data->schedule);
        }
        if (isset($data->purchase)) {
            $museum->purchase = Purchase::createFromData($data->purchase);
        }

        return $museum;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

}
