<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PagingInterface
 */

namespace Triquanta\IziTravel\DataType;


interface PagingInterface {

  /**
   * Get the number of individual records that are returned in each page.
   *
   * @return int
   */
  public function getLimit();

  /**
   * Get the number of returned records in section data. Values: [0..limit].
   *
   * @return int
   */
  public function getReturnedCount();

  /**
   * Get the total number of review records for the content at request time.
   *
   * @return int
   */
  public function getTotalCount();

}