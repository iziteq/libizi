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

    public static function createFromData(\stdClass $data, $form)
    {
        /** @var static $publisher */
        $publisher = parent::createBaseFromData($data, $form);
        foreach ($data->content as $contentData) {
            $publisher->content[] = PublisherContent::createFromData($contentData, $form);
        }
        if (isset($data->contacts)) {
            $publisher->contactInformation = PublisherContactInformation::createFromData($data->contacts, $form);
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
