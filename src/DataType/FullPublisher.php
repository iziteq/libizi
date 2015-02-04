<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a compact publisher data type.
 */
class FullPublisher extends PublisherBase implements FullPublisherInterface
{

    /**
     * The content.
     *
     * @var \Triquanta\IziTravel\DataType\PublisherContentInterface[]
     */
    protected $content = [];

    /**
     * The contact information.
     *
     * @return \Triquanta\IziTravel\DataType\PublisherContactInformationInterface[]
     */
    protected $contactInformation = [];

    /**
     * Constructs a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     * @param \Triquanta\IziTravel\DataType\ContentProviderInterface $contentProvider
     * @param string $status
     * @param \Triquanta\IziTravel\DataType\PublisherContentInterface[] $content
     * @param \Triquanta\IziTravel\DataType\PublisherContactInformationInterface[] $contactInformation
     */
    public function __construct(
      $uuid,
      $revisionHash,
      array $availableLanguageCodes,
      ContentProviderInterface $contentProvider,
      $status,
      array $content,
      array $contactInformation
    ) {
        parent::__construct($uuid, $revisionHash, $availableLanguageCodes,
          $contentProvider, $status);
        $this->content = $content;
        $this->contactInformation = $contactInformation;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'content' => [],
            'contacts' => [],
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }

        $contentProvider = ContentProvider::createFromData($data['content_provider']);
        $content = [];
        foreach ($data['content'] as $contentData) {
            $content[] = PublisherContent::createFromData($contentData);
        }
        $contactInformation = [];
        foreach ($data['contacts'] as $contactInformationData) {
            $contactInformation[] = PublisherContactInformation::createFromData($contactInformationData);
        }

        return new static($data['uuid'], $data['hash'], $data['languages'],
          $contentProvider, $data['status'], $content, $contactInformation);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getContactInformation()
    {
        return $this->contactInformation;
    }

}
