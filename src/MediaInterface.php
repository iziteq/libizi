<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\MediaInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a media data type.
 */
interface MediaInterface extends FactoryInterface, UuidInterface {

  /**
   * A story media item.
   */
  const TYPE_STORY = 'story';

  /**
   * A map media item.
   */
  const TYPE_MAP = 'map';

  /**
   * Gets the type.
   *
   * @return string
   *   One of the static::TYPE_* constants.
   */
  public function getType();

  /**
   * Gets the order.
   *
   * @return int
   */
  public function getOrder();

  /**
   * Gets the duration.
   *
   * @return int
   *   The duration in seconds.
   */
  public function getDuration();

  /**
   * Gets the URL.
   *
   * @return string|null
   */
  public function getUrl();

  /**
   * Gets the title.
   *
   * @return string|null
   */
  public function getTitle();

}
