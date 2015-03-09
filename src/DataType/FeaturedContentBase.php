<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedContentBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides featured content.
 */
abstract class FeaturedContentBase implements FeaturedContentInterface
{

    use FactoryTrait;
    use PublishableTrait;
    use TranslatableTrait;
    use UuidTrait;

    /**
     * Whether the object is promoted.
     *
     * @var bool
     */
    protected $promoted;

    /**
     * The code of the language in which the object was requested.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $requestedLanguageCode;

    /**
     * The content's language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * The description.
     *
     * @var string|null
     */
    protected $description;

    /**
     * The position (order).
     *
     * @var int|null
     */
    protected $position;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[]
     */
    protected $images = [];

    public static function createFromData(\stdClass $data)
    {
        $content = new static();
        $content->uuid = $data->uuid;
        $content->status = $data->status;
        $content->requestedLanguageCode = $data->language;
        $content->languageCode = $data->content_language;
        $content->name = $data->name;
        if (isset($data->description)) {
            $content->description = $data->description;
        }
        if (property_exists($data, 'promoted')) {
            $content->promoted = $data->promoted;
        }
        if (isset($data->content_languages)) {
            $content->availableLanguageCodes = $data->content_languages;
        }
        if (isset($data->position)) {
            $content->position = $data->position;
        }
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                if ($imageData->type == 'image') {
                    $content->images[] = FeaturedContentImage::createFromData($imageData);
                } elseif ($imageData->type == 'cover') {
                    $content->images[] = FeaturedContentCoverImage::createFromData($imageData);
                }
            }
        }

        return $content;
    }

    public function isPromoted()
    {
        return $this->promoted;
    }

    public function getRequestedLanguageCode()
    {
        return $this->requestedLanguageCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getImages()
    {
        return $this->images;
    }

}
