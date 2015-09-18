<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FullMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a full MTG object data type.
 */
abstract class FullMtgObjectBase extends MtgObjectBase implements FullMtgObjectInterface
{

    /**
     * The UUID of the parent object.
     *
     * @var string|null
     */
    protected $parentUuid;

    /**
     * The map.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $map;

    /**
     * The contactInformation.
     *
     * @var \Triquanta\IziTravel\DataType\ContactInformationInterface|null
     */
    protected $contactInformation;

    /**
     * The content.
     *
     * @var \Triquanta\IziTravel\DataType\ContentInterface[]
     */
    protected $content = [];

    /**
     * The sponsors.
     *
     * @var \Triquanta\IziTravel\DataType\SponsorInterface[]
     */
    protected $sponsors = [];

    public static function createFromData(\stdClass $data)
    {
        /** @var static $object */
        $object = parent::createBaseFromData($data);
        if (isset($data->parent_uuid)) {
            $object->parentUuid = $data->parent_uuid;
        }
        if (isset($data->contacts)) {
            $object->contactInformation = ContactInformation::createFromData($data->contacts);
        }
        if (isset($data->content)) {
            foreach ($data->content as $contentData) {
                $object->content[] = Content::createFromData($contentData);
            }
        }
        if (isset($data->map)) {
            $object->map = Map::createFromData($data->map);
        }
        if (isset($data->sponsors)) {
            foreach ($data->sponsors as $sponsorData) {
                $object->sponsors[] = Sponsor::createFromData($sponsorData);
            }
        }
        return $object;
    }

    public function getParentUuid()
    {
        return $this->parentUuid;
    }

    public function getTitle()
    {
        return !empty($this->getContent()[0]) ? $this->getContent()[0]->getTitle() : '';
    }

    public function getLanguageCode()
    {
        return !empty($this->getContent()[0]) ? $this->getContent()[0]->getLanguageCode() : '';
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getContactInformation()
    {
        return $this->contactInformation;
    }

    public function getMap()
    {
        return $this->map;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getSponsors()
    {
        return $this->sponsors;
    }

}
