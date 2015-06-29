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

    use PaidDataTrait;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/compactmtgobjects/museum_compact_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $museum */
        $museum = parent::createFromData($data);
        if (isset($data->purchase)) {
           $museum->purchase = Purchase::createFromData($data->purchase);
        }

        return $museum;
    }

}
