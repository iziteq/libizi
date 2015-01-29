<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContactInformationInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher contact information data type.
 */
interface PublisherContactInformationInterface extends FactoryInterface
{

  /**
   * Gets the website URL.
   *
   * @return string|null
   */
  public function getWebsiteUrl();

  /**
   * Gets the email address.
   *
   * @return string|null
   */
  public function getEmailAddress();

  /**
   * Gets the URL to the Twitter account.
   *
   * @return string|null
   */
  public function getTwitterUrl();

  /**
   * Gets the URL to the Facebook page.
   *
   * @return string|null
   */
  public function getFacebookUrl();

}
