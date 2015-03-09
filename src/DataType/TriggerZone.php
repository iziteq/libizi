<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TriggerZone.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a trigger zone data type.
 */
class TriggerZone implements TriggerZoneInterface
{

    use FactoryTrait;

    public static function createFromData(\stdClass $data, $form = null)
    {
        if (!isset($data->type)) {
            throw new \Exception('Trigger zone data must contain a "type" key.');
        }

        if ($data->type == static::TYPE_CIRCULAR) {
            return CircularTriggerZone::createFromData($data);
        } elseif ($data->type == static::TYPE_POLYGONAL) {
            return PolygonalTriggerZone::createFromData($data);
        } else {
            throw new InvalidTriggerZoneTypeFactoryException(sprintf('Invalid trigger zone type %s. Must be one of %s.',
              $data->type,
              implode(', ', [static::TYPE_POLYGONAL, static::TYPE_CIRCULAR])));
        }
    }

}
