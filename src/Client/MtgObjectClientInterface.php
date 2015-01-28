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

    /**
     * Gets multiple objects by their UUIDs.
     *
     * @param string[] $uuids
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\DataType\FullMtgObjectInterface[]
     */
    public function getMtgObjectsByUuids(array $uuids, array $languages);

    /**
     * Gets an object's children by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getMtgObjectsChildrenByUuid($uuid, array $languages);

}
