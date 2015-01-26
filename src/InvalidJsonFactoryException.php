<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\FactoryException.
 */

namespace Triquanta\IziTravel;

/**
 * Provides an exception to be thrown when the factory JSON is invalid.
 */
class InvalidJsonFactoryException extends \Exception {

  /**
   * Constructs a new instance.
   *
   * @param string $json
   *  The invalid JSON.
   * @param int $code
   * @param \Exception $previous
   */
  public function __construct($json, $code = 0, \Exception $previous = NULL) {
    parent::__construct(sprintf('Invalid JSON: %s', $json), $code, $previous);
  }

}
