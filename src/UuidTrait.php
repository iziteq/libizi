<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\UuidTrait.
 */

namespace Triquanta\IziTravel;

/**
 * Implements \Triquanta\IziTravel\UuidInterface.
 */
trait UuidTrait {

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * {@inheritdoc}
   */
  public function getUuid() {
    return $this->uuid;
  }

}
