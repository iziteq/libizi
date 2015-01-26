<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ConsumerInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a consumer data type.
 */
interface ConsumerInterface extends FactoryInterface, UuidInterface {

  /**
   * Gets the email address.
   *
   * @return string
   */
  public function getEmailAddress();

  /**
   * Gets the username.
   *
   * @return string
   */
  public function getUsername();

  /**
   * Gets the mobile phone number.
   *
   * @return string
   */
  public function getMobilePhoneNumber();

  /**
   * Gets the custom storage.
   *
   * @return mixed[]
   */
  public function getCustomStorage();

}
