<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\ProductionRequestHandler.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an handler for making requests to the production API.
 */
class ProductionRequestHandler extends RequestHandlerBase
{

    protected function getBaseUrl()
    {
        return 'https://api.izi.travel/';
    }

}
