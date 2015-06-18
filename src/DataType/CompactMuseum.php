<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactMuseum.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a compact museum data type.
 */
class CompactMuseum extends CompactMtgObjectBase implements CompactMuseumInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/museum_compact_object';
    }

}
