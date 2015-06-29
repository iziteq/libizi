<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PaidDataInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a data type that has to be paid for.
 */
interface PaidDataInterface
{

  /**
   * Gets the purchase.
   *
   * @return \Triquanta\IziTravel\DataType\PurchaseInterface|null
   */
  public function getPurchase();

}
