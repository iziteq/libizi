<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullPublisherInterface.
 */

namespace Triquanta\IziTravel\DataType;

use Iziteq\IziApiSchemes\Assets;

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
     * @return \Triquanta\IziTravel\DataType\PublisherContactInformationInterface
     */
    protected $contactInformation;

    protected static function getJsonSchemaPath()
    {
        return Assets::getJsonSchemaPath() . '/mtgobjects/publisher_full_object';
    }

    public static function createFromData(\stdClass $data)
    {
        /** @var static $publisher */
        $publisher = parent::createBaseFromData($data);
        foreach ($data->content as $contentData) {
            $publisher->content[] = PublisherContent::createFromData($contentData);
        }
        if (isset($data->contacts)) {
            $publisher->contactInformation = PublisherContactInformation::createFromData($data->contacts);
        }

        return $publisher;
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
