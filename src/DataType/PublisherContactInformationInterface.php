<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContactInformationInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher contact information data type.
 */
interface PublisherContactInformationInterface extends FactoryInterface
{

    /**
     * Gets the website URL.
     *
     * @return string|null
     */
    public function getWebsiteUrl();

    /**
     * Gets the email address.
     *
     * @return string|null
     */
    public function getEmailAddress();

    /**
     * Gets the URL to the Twitter account.
     *
     * @return string|null
     */
    public function getTwitterUrl();

    /**
     * Gets the URL to the Facebook page.
     *
     * @return string|null
     */
    public function getFacebookUrl();

    /**
     * Gets the URL to the Google+ account.
     *
     * @return string|null
     */
    public function getGooglePlusUrl();

    /**
     * Gets the URL to the Instagram page.
     *
     * @return string|null
     */
    public function getInstagramUrl();

    /**
     * Gets the URL to the Youtube account.
     *
     * @return string|null
     */
    public function getYouTubeUrl();

    /**
     * Gets the URL to the VKontakte account.
     *
     * @return string|null
     */
    public function getVKUrl();
}
