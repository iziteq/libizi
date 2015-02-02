<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Content.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a content data type.
 */
class Content implements ContentInterface
{

    use FactoryTrait;

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @var string
     */
    protected $title;

    /**
     * The summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * The description
     *
     * @var string
     */
    protected $description;

    /**
     * The playback.
     *
     * @var \Triquanta\IziTravel\DataType\PlaybackInterface|null
     */
    protected $playback;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\MediaInterface[]
     */
    protected $images = [];

    /**
     * The audio media.
     *
     * @var \Triquanta\IziTravel\DataType\MediaInterface[]
     */
    protected $audio = [];

    /**
     * The videos.
     *
     * @var \Triquanta\IziTravel\DataType\MediaInterface[]
     */
    protected $videos = [];

    /**
     * The child objects.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $children = [];

    /**
     * The collections.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $collections = [];

    /**
     * The references.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $references = [];

    /**
     * The quiz.
     *
     * @var \Triquanta\IziTravel\DataType\QuizInterface|null
     */
    protected $quiz;

    /**
     * Creates a new instance.
     *
     * @param string $languageCode
     * @param string $title
     * @param string $summary
     * @param string $description
     * @param \Triquanta\IziTravel\DataType\PlaybackInterface|null $playback
     * @param \Triquanta\IziTravel\DataType\MediaInterface[] $images
     * @param \Triquanta\IziTravel\DataType\MediaInterface[] $audio
     * @param \Triquanta\IziTravel\DataType\MediaInterface[] $videos
     * @param \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[] $children
     * @param \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[] $collections
     * @param \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[] $references
     * @param \Triquanta\IziTravel\DataType\QuizInterface|null $quiz
     */
    public function __construct(
      $languageCode,
      $title,
      $summary,
      $description,
      $playback,
      $images,
      $audio,
      $videos,
      array $children,
      array $collections,
      array $references,
      $quiz
    ) {
        $this->languageCode = $languageCode;
        $this->title = $title;
        $this->summary = $summary;
        $this->description = $description;
        $this->playback = $playback;
        $this->images = $images;
        $this->audio = $audio;
        $this->videos = $videos;
        $this->children = $children;
        $this->collections = $collections;
        $this->references = $references;
        $this->quiz = $quiz;
    }

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'playback' => null,
            'images' => [],
            'audio' => [],
            'video' => [],
            'children' => [],
            'collections' => [],
            'references' => [],
            'quiz' => null,
          ];
        $images = [];
        foreach ($data['images'] as $imageData) {
            $images[] = Media::createFromData($imageData);
        }
        $audio = [];
        foreach ($data['audio'] as $audioData) {
            $audio[] = Media::createFromData($audioData);
        }
        $video = [];
        foreach ($data['video'] as $videoData) {
            $video[] = Media::createFromData($videoData);
        }
        $children = [];
        foreach ($data['children'] as $childrenData) {
            $children[] = CompactMtgObject::createFromData($childrenData);
        }
        $collections = [];
        foreach ($data['collections'] as $collectionsData) {
            $collections[] = CompactMtgObject::createFromData($collectionsData);
        }
        $references = [];
        foreach ($data['references'] as $referencesData) {
            $references[] = CompactMtgObject::createFromData($referencesData);
        }
        $playback = $data['playback'] ? Playback::createFromData($data['playback']) : null;
        $quiz = $data['quiz'] ? Quiz::createFromData($data['quiz']) : null;

        return new static($data['language'], $data['title'], $data['summary'],
          $data['desc'], $playback, $images, $audio,
          $video, $children, $collections, $references, $quiz);
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getPlayback()
    {
        return $this->playback;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getAudio()
    {
        return $this->audio;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getCollections()
    {
        return $this->collections;
    }

    public function getReferences()
    {
        return $this->references;
    }

    public function getQuiz()
    {
        return $this->quiz;
    }

}
