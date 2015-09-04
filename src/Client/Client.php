<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\Client.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\Request\Cities;
use Triquanta\IziTravel\Request\CitiesByCountryUuid;
use Triquanta\IziTravel\Request\CityByUuid;
use Triquanta\IziTravel\Request\CityChildrenByUuid;
use Triquanta\IziTravel\Request\Countries;
use Triquanta\IziTravel\Request\CountryByUuid;
use Triquanta\IziTravel\Request\CountryChildrenByUuid;
use Triquanta\IziTravel\Request\FeaturedContent;
use Triquanta\IziTravel\Request\MtgObjectByUuid;
use Triquanta\IziTravel\Request\MtgObjectChildrenByUuid;
use Triquanta\IziTravel\Request\MtgObjectsByUuids;
use Triquanta\IziTravel\Request\PublisherByUuid;
use Triquanta\IziTravel\Request\PublisherChildrenByUuid;
use Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid;
use Triquanta\IziTravel\Request\Reviews;
use Triquanta\IziTravel\Request\ReviewsPost;
use Triquanta\IziTravel\DataType\ReviewPostable;
use Triquanta\IziTravel\Request\Search;

/**
 * Provides a client for interacting with the izi.TRAVEL MTG API.
 */
final class Client implements ClientInterface
{

    /**
     * The request handler.
     *
     * @var \Triquanta\IziTravel\Client\RequestHandlerInterface
     */
    protected $requestHandler;

    /**
     * Constructs a new instance.
     *
     * @param \Triquanta\IziTravel\Client\RequestHandlerInterface $requestHandler
     */
    public function __construct(RequestHandlerInterface $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    public function getMtgObjectByUuid(array $languageCodes, $uuid)
    {
        return MtgObjectByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getMtgObjectsByUuids(array $languageCodes, array $uuids)
    {
        return MtgObjectsByUuids::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuids($uuids);
    }

    public function getMtgObjectChildrenByUuid(array $languageCodes, $uuid)
    {
        return MtgObjectChildrenByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getCountryByUuid(array $languageCodes, $uuid)
    {
        return CountryByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getCountries(array $languageCodes)
    {
        return Countries::create($this->requestHandler)
          ->setLanguageCodes($languageCodes);
    }

    public function getCountryChildrenByUuid(array $languageCodes, $uuid)
    {
        return CountryChildrenByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getCityByUuid(array $languageCodes, $uuid)
    {
        return CityByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getCities(array $languageCodes)
    {
        return Cities::create($this->requestHandler)
          ->setLanguageCodes($languageCodes);
    }

    public function getCityChildrenByUuid(array $languageCodes, $uuid)
    {
        return CityChildrenByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getCitiesByCountryUuid(array $languageCodes, $uuid)
    {
        return CitiesByCountryUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getPublisherByUuid(array $languageCodes, $uuid)
    {
        return PublisherByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getPublisherChildrenByUuid(array $languageCodes, $uuid)
    {
        return PublisherChildrenByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function getPublisherChildrenLanguagesByUuid(
      array $languageCodes,
      $uuid
    ) {
        return PublisherChildrenLanguagesByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

    public function search(array $languageCodes, $query)
    {
        return Search::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setQuery($query);
    }

    public function getFeaturedContent(array $languageCodes)
    {
        return FeaturedContent::create($this->requestHandler)
          ->setLanguageCodes($languageCodes);
    }

    public function getReviewsByUuid($languageCode, $uuid)
    {
        // @todo: create unit test.
        return Reviews::create($this->requestHandler)
          ->setLanguage($languageCode)
          ->setUuid($uuid);
    }

    public function postReviewByUid(ReviewPostable $review) {
        // @todo: create unit test.
        $request = ReviewsPost::create($this->requestHandler);
        $request->setReview($review);
        return $request;
    }
}
