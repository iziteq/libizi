<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\LimitTrait.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Implements \Triquanta\IziTravel\Request\LimitInterface.
 */
Trait LimitTrait
{

    /**
     * The limit.
     *
     * @var int
     */
    protected $limit = 50;

    /**
     * The offset.
     *
     * @var int
     */
    protected $offset = 0;

    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

}
