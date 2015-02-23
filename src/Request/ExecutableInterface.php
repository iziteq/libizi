<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\ExecutableInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines an executable request.
 */
interface ExecutableInterface
{

    /**
     * Gets the request URL.
     *
     * @return string
     */
    public function execute();

}
