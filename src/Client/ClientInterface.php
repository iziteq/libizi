<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ClientInterface.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

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
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface
     */
    public function getMtgObjectByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_COMPACT);

    /**
     * Gets multiple objects by their UUIDs.
     *
     * @param string[] $uuids
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getMtgObjectsByUuids(array $uuids, array $languages, $form = MultipleFormInterface::FORM_COMPACT);

    /**
     * Gets an object's children by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getMtgObjectsChildrenByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL);

    /**
     * Gets a country by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CountryInterface
     */
    public function getCountryByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL);

    /**
     * Gets multiple countries.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function getCountries(array $languages, $form = MultipleFormInterface::FORM_COMPACT);

    /**
     * Gets a city by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CityInterface
     */
    public function getCityByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL);

    /**
     * Gets multiple cities.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return \Triquanta\IziTravel\DataType\CityInterface[]
     */
    public function getCities(array $languages, $form = MultipleFormInterface::FORM_COMPACT);

}
