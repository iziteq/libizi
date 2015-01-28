<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MissingUuidFactoryException.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an exception to be thrown when the factory JSON lacks a UUID.
 */
class MissingUuidFactoryException extends \Exception
{

    /**
     * Constructs a new instance.
     *
     * @param mixed $data
     *  The decoded JSON.
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($data, $code = 0, \Exception $previous = null)
    {
        parent::__construct(sprintf('Missing UUID in JSON: %s', json_encode($data)), $code,
          $previous);
    }

}
