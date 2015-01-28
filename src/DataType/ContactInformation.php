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

    /**
     * Creates a new instance.
     *
     * @param string $country_code
     * @param string $city
     * @param string $address
     * @param string $postal_code
     * @param string $administrative_subdivision
     * @param string $phone_number
     * @param string $website
     */
    public function __construct(
      $country_code,
      $city,
      $address,
      $postal_code,
      $administrative_subdivision,
      $phone_number,
      $website
    ) {
        $this->countryCode = $country_code;
        $this->city = $city;
        $this->address = $address;
        $this->postalCode = $postal_code;
        $this->administrativeSubdivision = $administrative_subdivision;
        $this->phoneNumber = $phone_number;
        $this->website = $website;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'postcode' => null,
            'state' => null,
            'phone_number' => null,
            'website' => null,
          ];
        return new static($data['country'], $data['city'], $data['address'],
          $data['postcode'], $data['state'], $data['phone_number'],
          $data['website']);
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
