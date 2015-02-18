<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\LocationInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a location data type.
 */
interface LocationInterface extends FactoryInterface
{

    /**
     * Gets the latitude.
     *
     * @return float|null
     */
    public function getLatitude();

    /**
     * Gets the longitude.
     *
     * @return float|null
     */
    public function getLongitude();

    /**
     * Gets the altitude.
     *
     * @return float|null
     *   The altitude in meters.
     */
    public function getAltitude();

    /**
     * Gets the exhibit number.
     *
     * @return string|null
     */
    public function getExhibitNumber();

    /**
     * Gets the public IP address.
     *
     * @return string|null
     */
    public function getPublicIpAddress();

    /**
     * Gets the UUID of the city this location is in.
     *
     * @return string|null
     */
    public function getCityUuid();

    /**
     * Gets the UUID of the country this location is in.
     *
     * @return string|null
     */
    public function getCountryUuid();

    /**
     * Gets the code of the country this location is in.
     *
     * @return string|null
     *   An ISO 3166-1 alpha-2 code or NULL.
     */
    public function getCountryCode();

}
