<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TriggerZoneInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a trigger zone data type.
 */
interface TriggerZoneInterface extends FactoryInterface
{

    /**
     * A circular trigger zone.
     */
    const TYPE_CIRCULAR = 'circle';

    /**
     * A polygonal (non-circular) trigger zone.
     */
    const TYPE_POLYGONAL = 'polygon';

}
