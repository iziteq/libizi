<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\UuidInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines a request that can be filtered by UUID.
 */
interface UuidInterface
{

    /**
     * Sets the UUID.
     *
     * @param string $uuid
     *
     * @return $this
     */
    public function setUuid($uuid);

}
