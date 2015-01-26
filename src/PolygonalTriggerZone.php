<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\PolygonalTriggerZone.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a polygonal trigger zone.
 */
class PolygonalTriggerZone implements PolygonalTriggerZoneInterface {

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
  public function __construct($corners) {
    $this->corners = $corners;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data + [
        'corners' => NULL,
      ];
    return new static($data['corners']);
  }

  /**
   * {@inheritdoc}
   */
  public function getCorners() {
    return $this->corners;
  }

}
