<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher data type.
 */
interface PublisherInterface extends FactoryInterface, PublishableInterface, RevisionableInterface, TranslatableInterface, UuidInterface
{

    /**
     * Gets the content provider.
     *
     * @return \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    public function getContentProvider();

}
