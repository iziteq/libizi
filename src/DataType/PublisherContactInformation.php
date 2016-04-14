<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContactInformation.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher contact information data type.
 */
class PublisherContactInformation implements PublisherContactInformationInterface
{

    use FactoryTrait;

    /**
     * The website URL.
     *
     * @var string|null
     */
    protected $websiteUrl;

    /**
     * The email address.
     *
     * @var string|null
     */
    protected $emailAddress;

    /**
     * The URL to the Twitter account.
     *
     * @var string|null
     */
    protected $twitterUrl;

    /**
     * The URL to the Facebook page.
     *
     * @var string|null
     */
    protected $facebookUrl;

    /**
     * The URL to the Google+ account.
     *
     * @var string|null
     */
    protected $googlePlusUrl;

    /**
     * The URL to the Instagram account.
     *
     * @var string|null
     */
    protected $instagramUrl;

    /**
     * The URL to the Youtube account.
     *
     * @var string|null
     */
    protected $youtubeUrl;

    /**
     * The URL to the VKontakte account.
     *
     * @var string|null
     */
    protected $vkontakteUrl;

    public static function createFromData(\stdClass $data)
    {
        $contactInformation = new static();
        if (isset($data->website)) {
            $contactInformation->websiteUrl = $data->website;
        }
        if (isset($data->email)) {
            $contactInformation->emailAddress = $data->email;
        }
        if (isset($data->facebook)) {
            $contactInformation->facebookUrl = $data->facebook;
        }
        if (isset($data->twitter)) {
            $contactInformation->twitterUrl = $data->twitter;
        }
        if (isset($data->googleplus)) {
            $contactInformation->googlePlusUrl = $data->googleplus;
        }
        if (isset($data->instagram)) {
            $contactInformation->instagramUrl = $data->instagram;
        }
        if (isset($data->youtube)) {
            $contactInformation->youtubeUrl = $data->youtube;
        }
        if (isset($data->vkontakte)) {
            $contactInformation->vkontakteUrl = $data->vkontakte;
        }

        return $contactInformation;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    public function getGooglePlusUrl()
    {
        return $this->googlePlusUrl;
    }

    public function getInstagramUrl()
    {
        return $this->instagramUrl;
    }

    public function getYoutubeUrl()
    {
        return $this->youtubeUrl;
    }

    public function getVKontakteUrl()
    {
        return $this->vkontakteUrl;
    }

}
