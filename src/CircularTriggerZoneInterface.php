<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\CircularTriggerZoneInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a circular trigger zone.
 */
interface CircularTriggerZoneInterface extends TriggerZoneInterface {

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
   * Gets the radius.
   *
   * @return float|null
   *   The radius in meters.
   */
  public function getRadius();

}
