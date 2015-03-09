<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a compact MTG object data type.
 */
abstract class CompactMtgObjectBase extends MtgObjectBase implements CompactMtgObjectInterface
{

    /**
     * The language code.
     *
     * @return string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @return string
     */
    protected $title;

    /**
     * The summary.
     *
     * @return string
     */
    protected $summary;

    /**
     * The images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

    public static function createFromData(\stdClass $data)
    {
        /** @var static $object */
        $object = parent::createBaseFromData($data);
        $object->languageCode = $data->language;
        $object->title = $data->title;
        $object->summary = $data->summary;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $object->images[] = Image::createFromData($imageData);
            }
        }

        return $object;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getImages()
    {
        return $this->images;
    }

}
