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

    /**
     * Constructs a new instance.
     *
     * @param string $uuid
     * @param string $status
     *   One of the \Triquanta\IziTravel|DataType\PublishableInterface::STATUS_*
     *   constants.
     * @param bool $promoted
     * @param string $requestedLanguageCode
     *   An ISO 639-1 alpha-2 language code.
     * @param string $languageCode
     *   An ISO 639-1 alpha-2 language code.
     * @param string $name
     * @param string $description
     * @param int|null $position
     * @param \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[] $images
     */
    public function __construct(
      $uuid,
      $status,
      $promoted,
      $requestedLanguageCode,
      $languageCode,
      $name,
      $description,
      $position,
      array $images
    ) {
        $this->uuid = $uuid;
        $this->status = $status;
        $this->promoted = $promoted;
        $this->requestedLanguageCode = $requestedLanguageCode;
        $this->languageCode = $languageCode;
        $this->name = $name;
        $this->description = $description;
        $this->position = $position;
        $this->images = $images;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'description' => null,
            'images' => [],
            'name' => null,
            'position' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }

        $images = [];
        foreach ($data['images'] as $imageData) {
            if ($imageData->type == 'image') {
                $images[] = FeaturedContentImage::createFromData($imageData);
            } elseif ($imageData->type == 'cover') {
                $images[] = FeaturedContentCoverImage::createFromData($imageData);
            }
        }

        return new static($data['uuid'], $data['status'], $data['promoted'],
          $data['language'], $data['content_language'], $data['name'],
          $data['description'], $data['position'], $images);
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
