<?php

/*
 * @file
 * Contains \Triquanta\IziTravel\MtgApiJsonSchemaUriRetriever.
 */

namespace Triquanta\IziTravel;

use JsonSchema\Uri\UriRetriever;

/**
 * Provides a retriever for izi.TRAVEL MTG API JSON schemas.
 */
class MtgApiJsonSchemaUriRetriever extends UriRetriever
{

    public function confirmMediaType($uriRetriever, $uri)
    {
        // Always return true, because the schema files have references to
        // online content which doesn't have the correct MIME type.
        return true;
    }

}
