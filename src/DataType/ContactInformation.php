<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContactInformation.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a contact information data type.
 */
class ContactInformation implements ContactInformationInterface
{

    use FactoryTrait;

    /**
     * The website address.
     *
     * @var string|null
     */
    protected $website;

    /**
     * The country code.
     *
     * @var string
     *   An ISO 3166-1 alpha-2 country code.
     */
    protected $countryCode;

    /**
     * The name of the city.
     *
     * @var string
     */
    protected $city;

    /**
     * The address.
     *
     * @var string
     */
    protected $address;

    /**
     * The postal code.
     *
     * @var string|null
     */
    protected $postalCode;

    /**
     * The phone number.
     *
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * The administrative subdivision.
     *
     * @var string|null
     */
    protected $administrativeSubdivision;

    public static function createFromData(\stdClass $data)
    {
        $contactInformation = new static();
        $contactInformation->countryCode = $data->country;
        $contactInformation->city = $data->city;
        $contactInformation->address = $data->address;
        if (isset($data->postcode)) {
            $contactInformation->postalCode = $data->postcode;
        }
        if (isset($data->state)) {
            $contactInformation->administrativeSubdivision = $data->state;
        }
        if (isset($data->phone_number)) {
            $contactInformation->phoneNumber = $data->phone_number;
        }
        if (isset($data->website)) {
            $contactInformation->website = $data->website;
        }

        return $contactInformation;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getAdministrativeSubdivision()
    {
        return $this->administrativeSubdivision;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getWebsite()
    {
        return $this->website;
    }

}
