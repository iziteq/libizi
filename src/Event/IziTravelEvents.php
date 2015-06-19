<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Event\IziTravelEvents.
 */

namespace Triquanta\IziTravel\Event;

/**
 * Defines events.
 *
 * The constants on this class contain the machine names of events for
 * \Symfony\Component\EventDispatcher\EventDispatcherInterface.
 */
class IziTravelEvents
{

    /**
     * Defines an event that is triggered before sending a request.
     *
     * @see \Triquanta\IziTravel\Event\PreRequest
     *   The event class.
     */
    const PRE_REQUEST = 'triquanta\izitravel.pre_request';

    /**
     * Defines an event that is triggered after receiving a response.
     *
     * @see \Triquanta\IziTravel\Event\PostResponse
     *   The event class.
     */
    const POST_RESPONSE = 'triquanta\izitravel.post_response';

}
