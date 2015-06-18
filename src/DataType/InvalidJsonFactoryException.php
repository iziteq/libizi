<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FactoryException.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an exception to be thrown when the factory JSON is invalid.
 */
class InvalidJsonFactoryException extends \Exception
{

    /**
     * Constructs a new instance.
     *
     * @param string $json
     *  The invalid JSON.
     * @param string|null $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(
      $json,
      $message = null,
      $code = 0,
      \Exception $previous = null
    ) {
        if ($message) {
            parent::__construct(sprintf('Invalid JSON (%s): %s', $message,
              $json), $code,
              $previous);
        } else {
            parent::__construct(sprintf('Invalid JSON: %s', $json), $code,
              $previous);
        }
    }

}
