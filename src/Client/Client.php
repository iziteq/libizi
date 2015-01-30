<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\Client.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\CompactCountry;
use Triquanta\IziTravel\DataType\CompactMtgObject;
use Triquanta\IziTravel\DataType\FullCountry;
use Triquanta\IziTravel\DataType\FullMtgObject;
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

    public function getCountries(array $languages, $form = MultipleFormInterface::FORM_FULL) {
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

}
