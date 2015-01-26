<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Playback.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a playback data type.
 */
class Playback implements  PlaybackInterface {

  /**
   * The type.
   *
   * @var string
   *   One of the static::TYPE_* constants.
   */
  protected $type;

  /**
   * The UUIDs.
   *
   * @var string[]
   */
  protected $uuids = [];

  /**
   * Creates a new instance.
   *
   * @param string $type
   *   One of the static::TYPE_* constants.
   * @param string[] $uuids
   */
  public function __construct($type, array $uuids) {
    $this->type = $type;
    $this->uuids = $uuids;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data;
    return new static($data['type'], $data['order']);
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function isRandom() {
    return $this->getType() == static::TYPE_RANDOM;
  }

  /**
   * {@inheritdoc}
   */
  public function isSequential() {
    return $this->getType() == static::TYPE_SEQUENTIAL;
  }

  /**
   * {@inheritdoc}
   */
  public function getUuids() {
    return $this->uuids;
  }

}
