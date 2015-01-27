<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Consumer.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a consumer data type.
 */
class Consumer implements ConsumerInterface
{

    use UuidTrait;

    /**
     * The custom storage.
     *
     * @var mixed[]
     */
    protected $customStorage;

    /**
     * The email address.
     *
     * @var string|null
     */
    protected $emailAddress;

    /**
     * The mobile phone number.
     *
     * @var string|null
     */
    protected $mobilePhoneNumber;

    /**
     * The username.
     *
     * @var string|null
     */
    protected $username;

    /**
     * Creates a new instance.
     *
     * @param string $uuid
     * @param string $username
     * @param string $email_address
     * @param string $mobile_phone_number
     * @param mixed[] $custom_storage
     */
    public function __construct(
      $uuid,
      $username,
      $email_address,
      $mobile_phone_number,
      array $custom_storage
    ) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->emailAddress = $email_address;
        $this->mobilePhoneNumber = $mobile_phone_number;
        $this->customStorage = $custom_storage;
    }

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $data = (array) $data + [
            'email' => null,
            'username' => null,
            'mobile' => null,
            'custom' => new \stdClass(),
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($json);
        }
        return new static($data['uuid'], $data['username'], $data['email'],
          $data['mobile'], (array) $data['custom']);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomStorage()
    {
        return $this->customStorage;
    }

}
