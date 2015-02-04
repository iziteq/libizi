<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\RevisionableTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\RevisionableInterface.
 */
trait RevisionableTrait
{

    /**
     * The revision hash.
     *
     * @var string
     */
    protected $revisionHash;

    public function getRevisionHash()
    {
        return $this->revisionHash;
    }

}
