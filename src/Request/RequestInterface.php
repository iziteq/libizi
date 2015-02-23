<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\RequestInterface.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\Client\RequestHandlerInterface;

/**
 * Defines a request.
 */
interface RequestInterface
{

    /**
     * Creates a new request.
     *
     * @return static
     */
    public static function create(RequestHandlerInterface $requestHandler);

    /**
     * Executes the request.
     *
     * @return mixed
     */
    public function execute();

}
