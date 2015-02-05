<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\Client.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MtgObjectBase;
use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Provides a client for interacting with the izi.TRAVEL MTG API.
 */
class Client implements ClientInterface
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
      $form = MultipleFormInterface::FORM_COMPACT
    ) {
        return $this->getMtgObjectsByUuids([$uuid], $languages, $form)[0];
    }

    public function getMtgObjectsByUuids(
      array $uuids,
      array $languages,
      $form = MultipleFormInterface::FORM_COMPACT
    ) {
        $json = $this->requestHandler->request('/mtgobjects/batch/' . implode(',',
            $uuids), [
          'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_FULL
    ) {
        $json = $this->requestHandler->request('/mtgobjects/' . $uuid . '/children',
          [
            'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_FULL
    ) {
        $json = $this->requestHandler->request('/countries/' . $uuid, [
          'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_COMPACT
    ) {
        $json = $this->requestHandler->request('/countries', [
          'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_FULL
    ) {
        $json = $this->requestHandler->request('/cities/' . $uuid, [
          'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_COMPACT
    ) {
        $json = $this->requestHandler->request('/cities', [
          'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_COMPACT
    ) {
        $json = $this->requestHandler->request('/countries/' . $uuid . '/cities',
          [
            'languages' => $languages,
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
      $form = MultipleFormInterface::FORM_FULL
    ) {
        $json = $this->requestHandler->request('/mtg/publishers/' . $uuid, [
          'languages' => $languages,
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
      array $types = [
        MtgObjectInterface::TYPE_TOUR,
        MtgObjectInterface::TYPE_MUSEUM
      ]
    ) {
        $json = $this->requestHandler->request('/mtg/objects/search/', [
          'languages' => $languages,
          'form' => $form,
          'type' => $types,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = MtgObjectBase::createMtgObject($objectData, $form);
        }

        return $objects;
    }

}
