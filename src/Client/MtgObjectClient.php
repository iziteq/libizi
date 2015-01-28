<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\MtgObjectClient.
 */

namespace Triquanta\IziTravel\Client;

use Triquanta\IziTravel\DataType\CompactMtgObject;
use Triquanta\IziTravel\DataType\FullMtgObject;

/**
 * Provides a client that handles MTGObjects.
 */
class MtgObjectClient implements MtgObjectClientInterface {

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

    public function getMtgObjectByUuid($uuid, array $languages) {
        return $this->getMtgObjectsByUuids([$uuid], $languages)[0];
    }

    public function getMtgObjectsByUuids(array $uuids, array $languages) {
        $json = $this->requestHandler->request('/mtgobjects/' . implode(',', $uuids), [
          'languages' => $languages,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = FullMtgObject::createFromData($objectData);
        }

        return $objects;
    }


    public function getMtgObjectsChildrenByUuid($uuid, array $languages) {
        $json = $this->requestHandler->request('/mtgobjects/' . $uuid . '/children', [
          'languages' => $languages,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            $objects[] = CompactMtgObject::createFromData($objectData);
        }

        return $objects;
    }

}
