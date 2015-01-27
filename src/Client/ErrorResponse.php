<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ErrorResponse.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an error response.
 */
class ErrorResponse implements ErrorResponseInterface {

    /**
     * The HTTP response code.
     *
     * @var int
     */
    protected $httpResponseCode;

    /**
     * The error message.
     *
     * @var string
     */
    protected $errorMessage;

    /**
     * Constructs a new instance.
     *
     * @param int $http_response_code
     * @param string $error_message
     */
    public function __construct($http_response_code, $error_message) {
        $this->httpResponseCode = $http_response_code;
        $this->errorMessage = $error_message;
    }

    public function getHttpResponseCode() {
        return $this->httpResponseCode;
    }

    public function getErrorMessage() {
        return $this->errorMessage;
    }

}
