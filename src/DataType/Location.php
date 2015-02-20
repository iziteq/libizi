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
     * The UUID of the city this location is in.
     *
     * @var string|null
     */
    protected $cityUuid;

    /**
     * The UUID of the country this location is in.
     *
     * @var string|null
     */
    protected $countryUuid;

    /**
     * The code of the country this location is in.
     *
     * @var string|null
     *   An ISO 3166-1 alpha-2 code or NULL.
     */
    protected $countryCode;

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
     * @param string|null $cityUuid
     * @param string|null $countryUuid
     * @param string|null $countryCode
     */
    public function __construct(
      $latitude,
      $longitude,
      $altitude,
      $exhibitNumber,
      $publicIpAddress,
      $cityUuid,
      $countryUuid,
      $countryCode
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        $this->exhibitNumber = $exhibitNumber;
        $this->publicIpAddress = $publicIpAddress;
        $this->cityUuid = $cityUuid;
        $this->countryUuid = $countryUuid;
        $this->countryCode = $countryCode;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'latitude' => null,
            'longitude' => null,
            'altitude' => null,
            'number' => null,
            'ip' => null,
            'city_uuid' => null,
            'country_uuid' => null,
            'country_code' => null,
          ];
        return new static($data['latitude'], $data['longitude'],
          $data['altitude'], $data['number'], $data['ip'], $data['city_uuid'],
          $data['country_uuid'], $data['country_code']);
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

    public function getCityUuid()
    {
        return $this->cityUuid;
    }

    public function getCountryUuid()
    {
        return $this->countryUuid;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

}
