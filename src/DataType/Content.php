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
     * @param string $language_code
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
      $language_code,
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
        $this->languageCode = $language_code;
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

    /**
     * {@inheritdoc}
     */
    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
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
        foreach ($data['images'] as $image_data) {
            $images[] = Media::createFromJson(json_encode($image_data));
        }
        $audio = [];
        foreach ($data['audio'] as $audio_data) {
            $audio[] = Media::createFromJson(json_encode($audio_data));
        }
        $video = [];
        foreach ($data['video'] as $video_data) {
            $video[] = Media::createFromJson(json_encode($video_data));
        }
        $children = [];
        foreach ($data['children'] as $children_data) {
            $children[] = CompactMtgObject::createFromJson(json_encode($children_data));
        }
        $collections = [];
        foreach ($data['collections'] as $collections_data) {
            $collections[] = CompactMtgObject::createFromJson(json_encode($collections_data));
        }
        $references = [];
        foreach ($data['references'] as $references_data) {
            $references[] = CompactMtgObject::createFromJson(json_encode($references_data));
        }
        return new static($data['language'], $data['title'], $data['summary'],
          $data['desc'], $data['playback'], $data['images'], $data['audio'],
          $data['video'], $children, $collections, $references, $data['quiz']);
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlayback()
    {
        return $this->playback;
    }

    /**
     * {@inheritdoc}
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * {@inheritdoc}
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * {@inheritdoc}
     */
    public function getCollections()
    {
        return $this->collections;
    }

    /**
     * {@inheritdoc}
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

}
