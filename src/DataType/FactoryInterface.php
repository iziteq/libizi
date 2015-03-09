<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FactoryInterface.
 */

namespace Triquanta\IziTravel\DataType;

interface FactoryInterface
{

    /**
     * Creates a new instances from izi.TRAVEL's API's JSON output.
     *
     * @param string $json
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\DataType\FactoryException
     */
    public static function createFromJson($json);

    /**
     * Creates a new instances from izi.TRAVEL's API's decoded JSON output.
     *
     * @param \stdClass $data
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\DataType\FactoryException
     */
    public static function createFromData(\stdClass $data);

}
