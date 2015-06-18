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
    use PublishableTrait;
    use RevisionableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * The content provider.
     *
     * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
     */
    protected $contentProvider;

    protected static function createBaseFromData(\stdClass $data)
    {
        $publisher = new static();
        $publisher->uuid = $data->uuid;
        $publisher->revisionHash = $data->hash;
        $publisher->availableLanguageCodes = $data->languages;
        $publisher->status = $data->status;
        $publisher->contentProvider = ContentProvider::createFromData($data->content_provider);

        return $publisher;
    }

    public static function createFromData(\stdClass $data)
    {
        if (isset($data->content)) {
            return FullPublisher::createFromData($data);
        } else {
            return CompactPublisher::createFromData($data);
        }
    }

    public function getContentProvider()
    {
        return $this->contentProvider;
    }

}
