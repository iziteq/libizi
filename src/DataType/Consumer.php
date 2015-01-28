<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Consumer.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a consumer data type.
 */
class Consumer implements ConsumerInterface
{

    use FactoryTrait;
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
     * @param string $emailAddress
     * @param string $mobilePhoneNumber
     * @param mixed[] $customStorage
     */
    public function __construct(
      $uuid,
      $username,
      $emailAddress,
      $mobilePhoneNumber,
      array $customStorage
    ) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->emailAddress = $emailAddress;
        $this->mobilePhoneNumber = $mobilePhoneNumber;
        $this->customStorage = $customStorage;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'email' => null,
            'username' => null,
            'mobile' => null,
            'custom' => new \stdClass(),
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        return new static($data['uuid'], $data['username'], $data['email'],
          $data['mobile'], (array) $data['custom']);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    public function getCustomStorage()
    {
        return $this->customStorage;
    }

}
