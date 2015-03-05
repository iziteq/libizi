<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FactoryTrait.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements parts of \Triquanta\IziTravel\DataType\FactoryInterface.
 */
Trait FactoryTrait
{

    public static function createFromJson($json, $form)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        return static::createFromData($data, $form);
    }

}
