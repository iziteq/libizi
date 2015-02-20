<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublishableTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\PublishableInterface.
 */
trait PublishableTrait
{

    /**
     * The status.
     *
     * @var string
     *   One of the \Triquanta\IziTravel\DataType\PublishableInterface::STATUS_*
     *   constants.
     */
    protected $status;

    public function isPublished()
    {
        return $this->status === PublishableInterface::STATUS_PUBLISHED;
    }

}
