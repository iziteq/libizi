<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\LimitInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines a request with configurable limited results.
 */
interface LimitInterface
{

    /**
     * Sets the limit.
     *
     * @param int $limit
     *
     * @return $this
     */
    public function setLimit($limit);

    /**
     * Sets the offset.
     *
     * @param int $offset
     *
     * @return $this
     */
    public function setOffset($offset);

}
