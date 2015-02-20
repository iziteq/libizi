<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ClientInterface.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Defines a client for interacting with the izi.TRAVEL MTG API.
 */
interface ClientInterface
{

    /**
     * Gets an object by UUID.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface
     */
    public function getMtgObjectByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    );

    /**
     * Gets multiple objects by their UUIDs.
     *
     * @param string[] $uuids
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getMtgObjectsByUuids(
      array $uuids,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    );

    /**
     * Gets an object's children by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getMtgObjectsChildrenByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    );

    /**
     * Gets a country by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\CountryInterface
     */
    public function getCountryByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    );

    /**
     * Gets multiple countries.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     * @param int $limit
     * @param int $offset
     *
     * @return \Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function getCountries(
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes,
      $limit = 20,
      $offset = 0
    );

    /**
     * Gets a country's children.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     * @param int $limit
     * @param int $offset
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getCountriesChildrenByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes,
      $limit = 20,
      $offset = 0
    );

    /**
     * Gets a city by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\CityInterface
     */
    public function getCityByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    );

    /**
     * Gets multiple cities.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     * @param int $limit
     * @param int $offset
     *
     * @return \Triquanta\IziTravel\DataType\CityInterface[]
     */
    public function getCities(
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes,
      $limit = 20,
      $offset = 0
    );

    /**
     * Gets a city's children.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     * @param int $limit
     * @param int $offset
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]
     */
    public function getCitiesChildrenByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes,
      $limit = 20,
      $offset = 0
    );

    /**
     * Gets multiple cities by a country's UUID.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\CityInterface[]
     */
    public function getCitiesByCountryUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    );

    /**
     * Gets a publisher by its UUIDs.
     *
     * @param string $uuid
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     *
     * @return \Triquanta\IziTravel\DataType\PublisherInterface
     */
    public function getPublisherByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    );

    /**
     * Gets multiple MTGObjects, cities, and/or countries.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     * @param string[] $includes
     *   The names of the sections to include.
     * @param string $query
     *   The search query.
     * @param int $limit
     *   The number of objects to return.
     * @param int $offset
     *   How many items to skip.
     * @param string $sort
     *   The field to sort by and the direction ("asc", or "desc"), separated by a
     *   colon.
     * @param string[] $types
     *   An array of \Triquanta\IziTravel\DataType\MtgObjectInterface::TYPE_*
     *   constants, and/or "city", and/or "country".
     *
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]|\Triquanta\IziTravel\DataType\CityInterface[]|\Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function getMtgObjects(
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes,
      $query,
      $limit = 50,
      $offset = 0,
      $sort = 'popularity:desc',
      array $types = [
        MtgObjectInterface::TYPE_TOUR,
        MtgObjectInterface::TYPE_MUSEUM
      ]
    );

    /**
     * Gets featured content.
     *
     * @param string[] $languages
     *   ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\DataType\FeaturedContentInterface[]
     */
    public function getFeaturedContent(
      array $languages
    );

}
