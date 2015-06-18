<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullExhibit.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

/**
 * Provides a full exhibit data type.
 */
class FullExhibit extends FullMtgObjectBase implements FullExhibitInterface
{

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/exhibit_full_object';
    }

}
