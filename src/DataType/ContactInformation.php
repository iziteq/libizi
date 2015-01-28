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
     * @param string $countryCode
     * @param string $city
     * @param string $address
     * @param string $postalCode
     * @param string $administrativeSubdivision
     * @param string $phoneNumber
     * @param string $website
     */
    public function __construct(
      $countryCode,
      $city,
      $address,
      $postalCode,
      $administrativeSubdivision,
      $phoneNumber,
      $website
    ) {
        $this->countryCode = $countryCode;
        $this->city = $city;
        $this->address = $address;
        $this->postalCode = $postalCode;
        $this->administrativeSubdivision = $administrativeSubdivision;
        $this->phoneNumber = $phoneNumber;
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
