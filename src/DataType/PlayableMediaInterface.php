<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PlayableMediaInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a playable media data type.
 */
interface PlayableMediaInterface extends MediaInterface
{

    /**
     * Gets the duration.
     *
     * @return int
     *   The duration in seconds.
     */
    public function getDuration();

}
