<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a compact publisher data type.
 */
interface CompactPublisherInterface extends PublisherInterface
{

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

    /**
     * Gets the language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Gets the summary.
     *
     * @return string
     */
    public function getSummary();

}
