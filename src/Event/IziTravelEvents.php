<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Event\IziTravelEvents.
 */

namespace Triquanta\IziTravel\Event;

/**
 * Defines events.
 */
class IziTravelEvents
{

    /**
     * Defines an event that is triggered before sending a request.
     *
     * @see \Triquanta\IziTravel\Event\PreRequest
     */
    const PRE_REQUEST = 'triquanta\izitravel.pre_request';

    /**
     * Defines an event that is triggered after receiving a response.
     *
     * @see \Triquanta\IziTravel\Event\PostResponse
     */
    const POST_RESPONSE = 'triquanta\izitravel.post_response';

}
