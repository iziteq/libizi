<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\TriggerZone.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a trigger zone data type.
 */
class TriggerZone implements TriggerZoneInterface
{

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data + [
            'type' => null,
          ];
        if ($data['type'] == static::TYPE_CIRCULAR) {
            return CircularTriggerZone::createFromJson($json);
        } elseif ($data['type'] == static::TYPE_POLYGONAL) {
            return PolygonalTriggerZone::createFromJson($json);
        } else {
            throw new InvalidTriggerZoneTypeFactoryException(sprintf('Invalid trigger zone type %s. Must be one of %s.',
              $data['type'],
              implode(', ', [static::TYPE_POLYGONAL, static::TYPE_CIRCULAR])));
        }
    }

}
