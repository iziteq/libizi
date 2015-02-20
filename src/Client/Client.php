<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\Client.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\FeaturedCity;
use Triquanta\IziTravel\DataType\FeaturedMuseum;
use Triquanta\IziTravel\DataType\FeaturedTour;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MtgObjectBase;
use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

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

    public function getMtgObjectByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    ) {
        $objects = $this->getMtgObjectsByUuids([$uuid], $languages, $form,
          $includes);

        return $objects ? reset($objects) : null;
    }

    public function getMtgObjectsByUuids(
      array $uuids,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    ) {
        $json = $this->requestHandler->request('/mtgobjects/batch/' . implode(',',
            $uuids), [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = MtgObjectBase::createMtgObject($objectData, $form);
        }

        return $objects;
    }

    public function getMtgObjectsChildrenByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    ) {
        $json = $this->requestHandler->request('/mtgobjects/' . $uuid . '/children',
          [
            'languages' => $languages,
            'includes' => $includes,
            'form' => $form,
          ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = MtgObjectBase::createMtgObject($objectData, $form);
        }

        return $objects;
    }

    public function getCountryByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    ) {
        $json = $this->requestHandler->request('/countries/' . $uuid, [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCountry::createFromData($data);
        } else {
            return FullCountry::createFromData($data);
        }
    }

    public function getCountries(
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    ) {
        $json = $this->requestHandler->request('/countries', [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $countries = [];
        foreach ($data as $countryData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $countries[] = CompactCountry::createFromData($countryData);
            } else {
                $countries[] = FullCountry::createFromData($countryData);
            }
        }

        return $countries;
    }

    public function getCityByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    ) {
        $json = $this->requestHandler->request('/cities/' . $uuid, [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCity::createFromData($data);
        } else {
            return FullCity::createFromData($data);
        }
    }

    public function getCities(
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    ) {
        $json = $this->requestHandler->request('/cities', [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $cities[] = CompactCity::createFromData($cityData);
            } else {
                $cities[] = FullCity::createFromData($cityData);
            }
        }

        return $cities;
    }

    public function getCitiesByCountryUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT,
      array $includes
    ) {
        $json = $this->requestHandler->request('/countries/' . $uuid . '/cities',
          [
            'languages' => $languages,
            'includes' => $includes,
            'form' => $form,
          ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $cities[] = CompactCity::createFromData($cityData);
            } else {
                $cities[] = FullCity::createFromData($cityData);
            }
        }

        return $cities;
    }

    public function getPublisherByUuid(
      $uuid,
      array $languages,
      $form = MultipleFormInterface::FORM_FULL,
      array $includes
    ) {
        $json = $this->requestHandler->request('/mtg/publishers/' . $uuid, [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactPublisher::createFromData($data);
        } else {
            return FullPublisher::createFromData($data);
        }
    }

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
    ) {
        $json = $this->requestHandler->request('/mtg/objects/search/', [
          'languages' => $languages,
          'includes' => $includes,
          'form' => $form,
          'sort_by' => $sort,
          'type' => $types,
          'query' => $query,
          'limit' => $limit,
          'offset' => $offset,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            if ($objectData->type === 'city') {
                if ($form === MultipleFormInterface::FORM_COMPACT) {
                    $objects[] = CompactCity::createFromData($objectData);
                } else {
                    $objects[] = FullCity::createFromData($objectData);
                }
            } elseif ($objectData->type === 'country') {
                if ($form === MultipleFormInterface::FORM_COMPACT) {
                    $objects[] = CompactCountry::createFromData($objectData);
                } else {
                    $objects[] = FullCountry::createFromData($objectData);
                }
            } else {
                $objects[] = MtgObjectBase::createMtgObject($objectData, $form);
            }
        }

        return $objects;
    }

    public function getFeaturedContent(
      array $languages
    ) {
        $json = $this->requestHandler->request('/featured/', [
          'languages' => $languages,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objectData = (array) $objectData;

            if ($objectData['type'] == 'museum') {
                $objects[] = FeaturedMuseum::createFromData($objectData);
            } elseif ($objectData['type'] == 'tour') {
                $objects[] = FeaturedTour::createFromData($objectData);
            } elseif ($objectData['type'] == 'city') {
                $objects[] = FeaturedCity::createFromData($objectData);
            }
        }

        return $objects;
    }

}
