<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\RevisionableInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a revisionable data type.
 */
interface RevisionableInterface
{

    /**
     * Gets the revision hash.
     *
     * @return string
     */
    public function getRevisionHash();

}
