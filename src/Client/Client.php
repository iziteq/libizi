<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\Client.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\CompactCity;
use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CompactMtgObject;
use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\FullCity;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\FullMtgObject;
use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Provides a client for interacting with the IZI Travel API.
 */
class Client implements ClientInterface {

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
    public function __construct(RequestHandlerInterface $requestHandler) {
        $this->requestHandler = $requestHandler;
    }

    public function getMtgObjectByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_COMPACT) {
        return $this->getMtgObjectsByUuids([$uuid], $languages, $form)[0];
    }

    public function getMtgObjectsByUuids(array $uuids, array $languages, $form = MultipleFormInterface::FORM_COMPACT) {
        $json = $this->requestHandler->request('/mtgobjects/batch/' . implode(',', $uuids), [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $objects[] = CompactMtgObject::createFromData($objectData);
            }
            else {
                $objects[] = FullMtgObject::createFromData($objectData);
            }
        }

        return $objects;
    }

    public function getMtgObjectsChildrenByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL) {
        $json = $this->requestHandler->request('/mtgobjects/' . $uuid . '/children', [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $objects[] = CompactMtgObject::createFromData($objectData);
            }
            else {
                $objects[] = FullMtgObject::createFromData($objectData);
            }
        }

        return $objects;
    }

    public function getCountryByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL) {
        $json = $this->requestHandler->request('/countries/' . $uuid, [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCountry::createFromData($data);
        }
        else {
            return FullCountry::createFromData($data);
        }
    }

    public function getCountries(array $languages, $form = MultipleFormInterface::FORM_COMPACT) {
        $json = $this->requestHandler->request('/countries', [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $countries = [];
        foreach ($data as $countryData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $objects[] = CompactCountry::createFromData($countryData);
            }
            else {
                $objects[] = FullCountry::createFromData($countryData);
            }
        }

        return $countries;
    }

    public function getCityByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL) {
        $json = $this->requestHandler->request('/cities/' . $uuid, [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactCity::createFromData($data);
        }
        else {
            return FullCity::createFromData($data);
        }
    }

    public function getCities(array $languages, $form = MultipleFormInterface::FORM_COMPACT) {
        $json = $this->requestHandler->request('/cities', [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $objects[] = CompactCity::createFromData($cityData);
            }
            else {
                $objects[] = FullCity::createFromData($cityData);
            }
        }

        return $cities;
    }

    public function getCitiesByCountryUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_COMPACT) {
        $json = $this->requestHandler->request('/countries/' . $uuid . '/cities', [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        $cities = [];
        foreach ($data as $cityData) {
            if ($form == MultipleFormInterface::FORM_COMPACT) {
                $objects[] = CompactCity::createFromData($cityData);
            }
            else {
                $objects[] = FullCity::createFromData($cityData);
            }
        }

        return $cities;
    }

    public function getPublisherByUuid($uuid, array $languages, $form = MultipleFormInterface::FORM_FULL) {
        $json = $this->requestHandler->request('/mtg/publishers/' . $uuid, [
          'languages' => $languages,
          'form' => $form,
        ]);
        $data = json_decode($json);
        if ($form == MultipleFormInterface::FORM_COMPACT) {
            return CompactPublisher::createFromData($data);
        }
        else {
            return FullPublisher::createFromData($data);
        }
    }

}
