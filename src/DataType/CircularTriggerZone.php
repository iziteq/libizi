<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CircularTriggerZone.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a circular trigger zone.
 */
class CircularTriggerZone implements CircularTriggerZoneInterface
{

    use FactoryTrait;

    /**
     * The latitude.
     *
     * @var float|null
     */
    protected $latitude;

    /**
     * The longitude.
     *
     * @var float|null
     */
    protected $longitude;

    /**
     * The altitude.
     *
     * @var float|null
     */
    protected $altitude;

    /**
     * The radius.
     *
     * @var float|null
     */
    protected $radius;

    public static function createFromData(\stdClass $data)
    {
        $triggerZone = new static();
        if (isset($data->circle_latitude)) {
            $triggerZone->latitude = $data->circle_latitude;
        }
        if (isset($data->circle_longitude)) {
            $triggerZone->longitude = $data->circle_longitude;
        }
        if (isset($data->circle_altitude)) {
            $triggerZone->altitude = $data->circle_altitude;
        }
        if (isset($data->circle_radius)) {
            $triggerZone->radius = $data->circle_radius;
        }

        return $triggerZone;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getAltitude()
    {
        return $this->altitude;
    }

    public function getRadius()
    {
        return $this->radius;
    }

}
