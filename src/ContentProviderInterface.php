<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ContentProviderInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a content provider data type.
 */
interface ContentProviderInterface extends FactoryInterface, UuidInterface {

  /**
   * Gets the name.
   *
   * @return string
   */
  public function getName();

  /**
   * Gets the copyright message.
   *
   * @return string|null
   */
  public function getCopyrightMessage();

}
