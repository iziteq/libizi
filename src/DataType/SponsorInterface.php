<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\SponsorInterface
 */

namespace Triquanta\IziTravel\DataType;


interface SponsorInterface extends FactoryInterface, UuidInterface
{
    /**
     * Gets the name.
     *
     * @return string
     */
    public function getName();


    /**
     * Gets the website address.
     *
     * @return string|null
     *   An absolute URL.
     */
    public function getWebsite();

    /**
     * Gets the order.
     *
     * @return int
     */
    public function getOrder();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();
}