<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\CompactMtgObjectInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a compact MTG object data type.
 */
interface CompactMtgObjectInterface extends MtgObjectInterface
{

    /**
     * Gets the language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    public function getLanguageCode();

    /**
     * Gets the route.
     *
     * @return string|null
     *   The route coordinates in KML format.
     */
    public function getRoute();

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
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\MediaInterface[]
     */
    public function getImages();

    /**
     * Counts the child objects.
     *
     * @return int|null
     */
    public function countChildren();

}
