<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactCollection.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact collection data type.
 */
class CompactCollection extends CompactMtgObjectBase implements CompactCollectionInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/collection_compact_object';
    }

}
