<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContentProviderInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a content provider data type.
 */
interface ContentProviderInterface extends FactoryInterface, UuidInterface
{

    /**
     * Gets the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Gets the copyright message.
     *
     * @return string|null
     */
    public function getCopyrightMessage();

}
