<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\MtgObjectClient.
 */

namespace Triquanta\IziTravel\Client;

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
        $json = $this->requestHandler->request('/mtgobjects/' . $uuid, [
          'languages' => $languages,
        ]);
        $data = json_decode($json);
        $object_data = $data[0];
        return FullMtgObject::createFromData($object_data);
    }

}
