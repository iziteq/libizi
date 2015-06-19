<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Event\PreRequest.
 */

namespace Triquanta\IziTravel\Event;

use GuzzleHttp\Message\RequestInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Provides an event that is dispatched before sending a request.
 *
 * @see \Triquanta\IziTravel\Event\IziTravelEvents::PRE_REQUEST
 */
class PreRequest extends Event
{

    /**
     * The Guzzle request.
     *
     * @var \GuzzleHttp\Message\RequestInterface
     */
    protected $request;

    /**
     * Constructs a new instance.
     *
     * @param \GuzzleHttp\Message\RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * Gets the request.
     *
     * @return \GuzzleHttp\Message\RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

}
