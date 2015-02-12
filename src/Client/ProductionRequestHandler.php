<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ProductionRequestHandler.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an handler for making requests to the production API.
 */
final class ProductionRequestHandler extends RequestHandlerBase
{

    protected function getBaseUrl()
    {
        return 'https://api.izi.travel/';
    }

}
