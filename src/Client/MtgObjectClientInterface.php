<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\MtgObjectClientInterface.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Defines a client that handles MTGObjects.
 */
interface MtgObjectClientInterface {

    /**
     * Gets an object by UUID.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\DataType\FullMtgObjectInterface
     */
    public function getMtgObjectByUuid($uuid, array $languages);

}
