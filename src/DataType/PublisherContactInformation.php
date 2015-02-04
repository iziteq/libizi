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
     * Creates a new instance.
     *
     * @param string|null $websiteUrl
     * @param string|null $emailAddress
     * @param string|null $twitterUrl
     * @param string|null $facebookUrl
     */
    public function __construct(
      $websiteUrl,
      $emailAddress,
      $twitterUrl,
      $facebookUrl
    ) {
        $this->websiteUrl = $websiteUrl;
        $this->emailAddress = $emailAddress;
        $this->twitterUrl = $twitterUrl;
        $this->facebookUrl = $facebookUrl;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'website' => null,
            'email' => null,
            'twitter' => null,
            'facebook' => null,
          ];

        return new static($data['website'], $data['email'], $data['twitter'],
          $data['facebook']);
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

}
