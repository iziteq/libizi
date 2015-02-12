<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\StagingRequestHandler.
 */

namespace Triquanta\IziTravel\Client;

/**
 * Provides an handler for making requests to the staging API.
 */
final class StagingRequestHandler extends RequestHandlerBase
{

    protected function getBaseUrl()
    {
        return 'https://api.stage.izi.travel/';
    }

}
