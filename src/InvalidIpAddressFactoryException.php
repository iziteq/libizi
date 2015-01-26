<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\InvalidIpAddressFactoryException.
 */

namespace Triquanta\IziTravel;

/**
 * Provides an exception to be thrown when the factory JSON contains an invalid
 * IP address.
 */
class InvalidIpAddressFactoryException extends \Exception {

  /**
   * Constructs a new instance.
   *
   * @param string $ip_address
   * @param string $json
   *   The JSON.
   * @param int $code
   * @param \Exception $previous
   */
  public function __construct($ip_address, $json, $code = 0, \Exception $previous = NULL) {
    parent::__construct(sprintf('Invalid IP address %s in JSON: %s', $ip_address, $json), $code, $previous);
  }

}
