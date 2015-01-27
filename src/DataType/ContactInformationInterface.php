<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContactInformationInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a contact information data type.
 */
interface ContactInformationInterface extends FactoryInterface
{

    /**
     * Gets the website address.
     *
     * @return string|null
     *   An absolute URL.
     */
    public function getWebsite();

    /**
     * Gets the country code.
     *
     * @return string
     *   An ISO 3166-1 alpha-2 country code.
     */
    public function getCountryCode();

    /**
     * Gets the name of the city.
     *
     * @return string
     */
    public function getCity();

    /**
     * Gets the address.
     *
     * @return string
     */
    public function getAddress();

    /**
     * Gets the postal code.
     *
     * @return string|null
     */
    public function getPostalCode();

    /**
     * Gets the phone number.
     *
     * @return string|null
     */
    public function getPhoneNumber();

    /**
     * Gets the name of the administrative subdivision.
     *
     * @return string|null
     */
    public function getAdministrativeSubdivision();

}
