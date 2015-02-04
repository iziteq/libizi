<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a publisher data type.
 */
abstract class PublisherBase implements PublisherInterface
{

    use FactoryTrait;
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    /**
     * Constructs a new instance.
     *
     * @param string $uuid
     * @param string $revisionHash
     * @param string[] $availableLanguageCodes
     */
    public function __construct(
      $uuid,
      $revisionHash,
      array $availableLanguageCodes,
      ContentProviderInterface $contentProvider,
      $status
    ) {
        $this->uuid = $uuid;
        $this->revisionHash = $revisionHash;
        $this->availableLanguageCodes = $availableLanguageCodes;
        $this->contentProvider = $contentProvider;
        $this->status = $status;
    }

    public function isPublished()
    {
        return $this->status == static::STATUS_PUBLISHED;
    }

    public function getContentProvider()
    {
        return $this->contentProvider;
    }

}
