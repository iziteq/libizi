<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Location.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a location data type.
 */
class Location implements LocationInterface
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
     * The exhibit number.
     *
     * @var string|null
     */
    protected $exhibitNumber;

    /**
     * The public IP address.
     *
     * @var string|null
     */
    protected $publicIpAddress;

    /**
     * Creates a new instance.
     *
     * @param float|null $latitude
     * @param float|null $longitude
     * @param float|null $altitude
     * @param string|null $exhibitNumber
     * @param string|null $publicIpAddress
     */
    public function __construct(
      $latitude,
      $longitude,
      $altitude,
      $exhibitNumber,
      $publicIpAddress
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        $this->exhibitNumber = $exhibitNumber;
        $this->publicIpAddress = $publicIpAddress;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'latitude' => null,
            'longitude' => null,
            'altitude' => null,
            'number' => null,
            'ip' => null,
          ];
        return new static($data['latitude'], $data['longitude'],
          $data['altitude'], $data['number'], $data['ip']);
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

    public function getExhibitNumber()
    {
        return $this->exhibitNumber;
    }

    public function getPublicIpAddress()
    {
        return $this->publicIpAddress;
    }

}
