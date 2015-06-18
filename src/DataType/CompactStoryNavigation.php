<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactStoryNavigation.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a compact story navigation data type.
 */
class CompactStoryNavigation extends CompactMtgObjectBase implements CompactStoryNavigationInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/story_navigation_compact_object';
    }

}
