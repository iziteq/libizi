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

    public static function createFromData(\stdClass $data)
    {
        $location = new static();
        if (isset($data->latitude)) {
            $location->latitude = $data->latitude;
        }
        if (isset($data->longitude)) {
            $location->longitude = $data->longitude;
        }
        if (isset($data->altitude)) {
            $location->altitude = $data->altitude;
        }
        if (isset($data->number)) {
            $location->exhibitNumber = $data->number;
        }
        if (isset($data->ip)) {
            $location->publicIpAddress = $data->ip;
        }
        if (isset($data->city_uuid)) {
            $location->cityUuid = $data->city_uuid;
        }
        if (isset($data->country_uuid)) {
            $location->countryUuid = $data->country_uuid;
        }
        if (isset($data->country_code)) {
            $location->countryCode = $data->country_code;
        }

        return $location;
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
