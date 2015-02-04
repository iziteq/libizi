<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContentInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher content data type.
 */
interface PublisherContentInterface extends FactoryInterface
{

    /**
     * Gets the language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

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

    /**
     * Gets the description.
     *
     * @return string
     */
    public function getDescription();

}
