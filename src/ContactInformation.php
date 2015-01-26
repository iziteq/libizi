<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ContactInformation.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a contact information data type.
 */
class ContactInformation implements ContactInformationInterface {

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
  public function __construct($country_code, $city, $address, $postal_code, $administrative_subdivision, $phone_number, $website) {
    $this->countryCode= $country_code;
    $this->city = $city;
    $this->address = $address;
    $this->postalCode = $postal_code;
    $this->administrativeSubdivision = $administrative_subdivision;
    $this->phoneNumber = $phone_number;
    $this->website = $website;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data + [
      'postcode' => NULL,
      'state' => NULL,
      'phone_number' => NULL,
      'website' => NULL,
    ];
    return new static($data['country'], $data['city'], $data['address'], $data['postcode'], $data['state'], $data['phone_number'], $data['website']);
  }

  /**
   * {@inheritdoc}
   */
  public function getCountryCode() {
    return $this->countryCode;
  }

  /**
   * {@inheritdoc}
   */
  public function getCity() {
    return $this->city;
  }

  /**
   * {@inheritdoc}
   */
  public function getAddress() {
    return $this->address;
  }

  /**
   * {@inheritdoc}
   */
  public function getPostalCode() {
    return $this->postalCode;
  }

  /**
   * {@inheritdoc}
   */
  public function getAdministrativeSubdivision() {
    return $this->administrativeSubdivision;
  }

  /**
   * {@inheritdoc}
   */
  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  /**
   * {@inheritdoc}
   */
  public function getWebsite() {
    return $this->website;
  }

}
