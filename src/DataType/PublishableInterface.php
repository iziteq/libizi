<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublishableInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publishable data type.
 */
interface PublishableInterface
{

    /**
     * A published object.
     */
    const STATUS_PUBLISHED = 'published';

    /**
     * An unpublished/limited object.
     */
    const STATUS_LIMITED = 'limited';

    /**
     * Gets whether the object is published.
     *
     * @return bool
     */
    public function isPublished();

}
