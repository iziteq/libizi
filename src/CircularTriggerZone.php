<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\CircularTriggerZone.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a circular trigger zone.
 */
class CircularTriggerZone implements CircularTriggerZoneInterface
{

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

    /**
     * Creates a new instance.
     *
     * @param float|null $latitude
     * @param float|null $longitude
     * @param float|null $altitude
     * @param float|null $radius
     */
    public function __construct($latitude, $longitude, $altitude, $radius)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        $this->radius = $radius;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data + [
            'latitude' => null,
            'longitude' => null,
            'altitude' => null,
            'radius' => null,
          ];
        return new static($data['latitude'], $data['longitude'],
          $data['altitude'], $data['radius']);
    }

    /**
     * {@inheritdoc}
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getRadius()
    {
        return $this->radius;
    }

}
