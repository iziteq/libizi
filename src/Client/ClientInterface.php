<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ClientInterface.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\ReviewPostable;

/**
 * Defines a client for interacting with the izi.TRAVEL MTG API.
 */
interface ClientInterface
{

    /**
     * Gets a request to get an MTGObject by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\MtgObjectByUuid
     */
    public function getMtgObjectByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get an MTGObject's children by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string[] $uuids
     *
     * @return \Triquanta\IziTravel\Request\MtgObjectsByUuids
     */
    public function getMtgObjectsByUuids(array $languageCodes, array $uuids);

    /**
     * Gets a request to get a city's children by UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CityChildrenByUuid
     */
    public function getMtgObjectChildrenByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get a country by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CountryByUuid
     */
    public function getCountryByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get countries.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\Request\countries
     */
    public function getCountries(array $languageCodes);

    /**
     * Gets a request to get a country's children by UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CountryChildrenByUuid
     */
    public function getCountryChildrenByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get a city by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CityByUuid
     */
    public function getCityByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get cities.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\Request\Cities
     */
    public function getCities(array $languageCodes);

    /**
     * Gets a request to get a city's children by UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CityChildrenByUuid
     */
    public function getCityChildrenByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get cities by a country's UUIDs.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\CitiesByCountryUuid
     */
    public function getCitiesByCountryUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get a publisher by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\PublisherByUuid
     */
    public function getPublisherByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get a publisher's children by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\PublisherChildrenByUuid
     */
    public function getPublisherChildrenByUuid(array $languageCodes, $uuid);

    /**
     * Gets a request to get a publisher's children's languages by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid
     */
    public function getPublisherChildrenLanguagesByUuid(
      array $languageCodes,
      $uuid
    );

    /**
     * Gets a search request.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $query
     *
     * @return \Triquanta\IziTravel\Request\Search
     */
    public function search(array $languageCodes, $query);

    /**
     * Gets a featured content request.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     *
     * @return \Triquanta\IziTravel\Request\FeaturedContent
     */
    public function getFeaturedContent(array $languageCodes);

    /**
     * Gets a request to get a publisher's children by its UUID.
     *
     * @param string $languageCode
     *   An ISO 639-1 alpha-2 language code.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\Reviews
     */
    public function getReviewsByUuid($languageCode, $uuid);

    /**
     * Gets a request to post a review.
     *
     * @param \Triquanta\IziTravel\DataType\ReviewPostable $review
     *   A fully filled postable review.
     *
     * @return \Triquanta\IziTravel\Request\ReviewsPost
     */
    public function postReviewByUid(ReviewPostable $review);

}
