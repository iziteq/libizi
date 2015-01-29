<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher data type.
 */
interface PublisherInterface extends FactoryInterface, RevisionableInterface, TranslatableInterface, UuidInterface
{

  const STATUS_PUBLISHED = 'published';

  /**
   * Checks whether the publisher is published.
   *
   * @return bool
   */
  public function isPublished();

  /**
   * Gets the content provider.
   *
   * @return \Triquanta\IziTravel\DataType\ContentProviderInterface
   */
  public function getContentProvider();

}
