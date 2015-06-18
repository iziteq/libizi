<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactExhibit.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a compact exhibit data type.
 */
class CompactExhibit extends CompactMtgObjectBase implements CompactExhibitInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/common_compact_object';
    }

}
