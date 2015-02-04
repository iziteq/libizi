<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ErrorResponseException.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an exception that represents an error response from the MTG API.
 *
 * The exception code and message are the HTTP response code and the error
 * message respectively.
 */
class ErrorResponseException extends ClientException
{
}
