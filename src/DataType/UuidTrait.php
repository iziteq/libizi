<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\UuidTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\UuidInterface.
 */
trait UuidTrait
{

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    public function getUuid()
    {
        return $this->uuid;
    }

}
