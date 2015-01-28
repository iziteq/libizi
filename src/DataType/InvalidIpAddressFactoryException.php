<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\InvalidIpAddressFactoryException.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an exception to be thrown when the factory JSON contains an invalid
 * IP address.
 */
class InvalidIpAddressFactoryException extends \Exception
{

    /**
     * Constructs a new instance.
     *
     * @param string $ip_address
     * @param string $data
     *   The decoded JSON.
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(
      $ip_address,
      $data,
      $code = 0,
      \Exception $previous = null
    ) {
        parent::__construct(sprintf('Invalid IP address %s in JSON: %s',
          $ip_address, json_encode($data)), $code, $previous);
    }

}
