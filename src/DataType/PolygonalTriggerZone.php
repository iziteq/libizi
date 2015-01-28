<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PolygonalTriggerZone.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a polygonal trigger zone.
 */
class PolygonalTriggerZone implements PolygonalTriggerZoneInterface
{
    use FactoryTrait;

    /**
     * The corners.
     *
     * @var string|null
     */
    protected $corners;

    /**
     * Creates a new instance.
     *
     * @param string|null $corners
     */
    public function __construct($corners)
    {
        $this->corners = $corners;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'corners' => null,
          ];
        return new static($data['corners']);
    }

    /**
     * {@inheritdoc}
     */
    public function getCorners()
    {
        return $this->corners;
    }

}
