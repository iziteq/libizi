<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\DevelopmentRequestHandler.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an handler for making requests to the development API.
 */
final class DevelopmentRequestHandler extends RequestHandlerBase
{

    protected function getBaseUrl()
    {
        return 'https://api.dev.izi.travel/';
    }

}
