<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\LocationInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a location data type.
 */
interface LocationInterface extends FactoryInterface {

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
   *
   * @todo Find out and document which unit this is in (meters)?
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

}
