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

    public static function createBaseFromData(\stdClass $data, $form) {
        if (!isset($data->uuid)) {
            throw new MissingUuidFactoryException($data);
        }

        $publisher = new static();
        $publisher->uuid = $data->uuid;
        $publisher->revisionHash = $data->hash;
        $publisher->availableLanguageCodes = $data->languages;
        $publisher->status = $data->status;
        $publisher->contentProvider = ContentProvider::createFromData($data->content_provider, $form);

        return $publisher;
    }

    public static function createFromData(\stdClass $data, $form) {
        if ($form === MultipleFormInterface::FORM_FULL) {
            return FullPublisher::createFromData($data, $form);
        }
        elseif ($form === MultipleFormInterface::FORM_COMPACT) {
            return CompactPublisher::createFromData($data, $form);
        }
    }

    public function getContentProvider()
    {
        return $this->contentProvider;
    }

}
