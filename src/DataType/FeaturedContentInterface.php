<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedContentInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines featured content.
 */
interface FeaturedContentInterface extends UuidInterface, PublishableInterface, FactoryInterface, TranslatableInterface
{

    /**
     * Returns whether the object is promoted.
     *
     * @return bool
     */
    public function isPromoted();

    /**
     * Returns the code of the language in which the object was requested.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getRequestedLanguageCode();

    /**
     * Returns the content's language.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the name.
     *
     * @return string|null
     */
    public function getName();

    /**
     * Gets the description.
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Gets the position (order).
     *
     * @return int|null
     */
    public function getPosition();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[]
     */
    public function getImages();

}
