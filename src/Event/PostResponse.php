<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Event\PostResponse.
 */

namespace Triquanta\IziTravel\Event;

use GuzzleHttp\Message\ResponseInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched after receiving a response.
 *
 * @see \Triquanta\IziTravel\Event\IziTravelEvents::POST_RESPONSE
 */
class PostResponse extends Event
{

    /**
     * The Guzzle response.
     *
     * @var \GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    /**
     * Constructs a new instance.
     *
     * @param \GuzzleHttp\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Gets the response.
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

}
