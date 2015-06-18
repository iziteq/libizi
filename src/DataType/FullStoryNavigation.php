<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullStoryNavigation.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full story navigation data type.
 */
class FullStoryNavigation extends FullMtgObjectBase implements FullStoryNavigationInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/story_navigation_full_object';
    }

}
