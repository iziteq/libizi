<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\FactoryInterface.
 */

namespace Triquanta\IziTravel;

interface FactoryInterface
{

    /**
     * Creates a new instances from IZI Travel's API's JSON output.
     *
     * @param string $json
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\FactoryException
     */
    public static function createFromJson($json);

}
