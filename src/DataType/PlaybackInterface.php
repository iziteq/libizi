<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PlaybackInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a playback data type.
 */
interface PlaybackInterface extends FactoryInterface
{

    /**
     * Sequential playback.
     */
    const TYPE_SEQUENTIAL = 'sequential';

    /**
     * Random playback.
     */
    const TYPE_RANDOM = 'random';

    /**
     * Gets the type.
     *
     * @return string
     *   One of the static::TYPE_* constants.
     */
    public function getType();

    /**
     * Gets whether playback is random.
     *
     * @return bool
     */
    public function isRandom();

    /**
     * Gets whether playback is sequential.
     *
     * @return bool
     */
    public function isSequential();

    /**
     * Gets the UUIDs.
     *
     * @return string[]
     */
    public function getUuids();

}
