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
     * This method must also validate the JSON, if a schema is available.
     *
     * @param string $json
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\DataType\FactoryException
     *   Thrown when the argument is invalid.
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
     *   Thrown when the argument is invalid.
     */
    public static function createFromData(\stdClass $data);

}
