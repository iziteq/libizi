<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullCollection.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full collection data type.
 */
class FullCollection extends FullMtgObjectBase implements FullCollectionInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/collection_full_object';
    }

}
