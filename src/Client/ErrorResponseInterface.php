<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ErrorResponseInterface.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Defines an error response.
 */
interface ErrorResponseInterface {

    /**
     * Gets the HTTP response code.
     *
     * @return int
     */
    public function getHttpResponseCode();

    /**
     * Gets the error message.
     *
     * @return string
     */
    public function getErrorMessage();

}
