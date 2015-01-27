<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\MissingUuidFactoryException.
 */

namespace Triquanta\IziTravel;

/**
 * Provides an exception to be thrown when the factory JSON lacks a UUID.
 */
class MissingUuidFactoryException extends \Exception
{

    /**
     * Constructs a new instance.
     *
     * @param string $json
     *  The JSON.
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($json, $code = 0, \Exception $previous = null)
    {
        parent::__construct(sprintf('Missing UUID in JSON: %s', $json), $code,
          $previous);
    }

}
