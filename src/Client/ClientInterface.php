<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ClientInterface.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\MtgObjectInterface;

/**
 * Defines a client for interacting with the IZI Travel API.
 */
interface ClientInterface {

    /**
     * Gets an object by UUID.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MtgObjectInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface
     */
    public function getMtgObjectByUuid($uuid, array $languages, $form = MtgObjectInterface::FORM_COMPACT);

    /**
     * Gets multiple objects by their UUIDs.
     *
     * @param string[] $uuids
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MtgObjectInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getMtgObjectsByUuids(array $uuids, array $languages, $form = MtgObjectInterface::FORM_COMPACT);

    /**
     * Gets an object's children by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MtgObjectInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getMtgObjectsChildrenByUuid($uuid, array $languages, $form = MtgObjectInterface::FORM_FULL);

    /**
     * Gets a country by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MtgObjectInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getCountryByUuid($uuid, array $languages, $form = MtgObjectInterface::FORM_FULL);

    /**
     * Gets multiple countries.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MtgObjectInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function getCountries(array $languages, $form = MtgObjectInterface::FORM_FULL);

}
