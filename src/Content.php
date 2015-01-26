<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Content.
 */

namespace Triquanta\IziTravel;

/**
 * Provides a content data type.
 */
class Content implements ContentInterface {

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
   * @var \Triquanta\IziTravel\PlaybackInterface|null
   */
  protected $playback;

  /**
   * The images.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $images = [];

  /**
   * The audio media.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $audio = [];

  /**
   * The videos.
   *
   * @var \Triquanta\IziTravel\MediaInterface[]
   */
  protected $videos = [];

  /**
   * The quiz.
   *
   * @var \Triquanta\IziTravel\QuizInterface|null
   */
  protected $quiz;

  /**
   * Creates a new instance.
   *
   * @param string $language_code
   * @param string $title
   * @param string $summary
   * @param string $description
   * @param \Triquanta\IziTravel\PlaybackInterface|null $playback
   * @param \Triquanta\IziTravel\MediaInterface[] $images
   * @param \Triquanta\IziTravel\MediaInterface[] $audio
   * @param \Triquanta\IziTravel\MediaInterface[] $videos
   * @param \Triquanta\IziTravel\QuizInterface|null $quiz
   */
  public function __construct($language_code, $title, $summary, $description, $playback, $images, $audio, $videos, $quiz) {
    $this->languageCode = $language_code;
    $this->title = $title;
    $this->summary = $summary;
    $this->description = $description;
    $this->playback = $playback;
    $this->images = $images;
    $this->audio = $audio;
    $this->videos = $videos;
    $this->quiz = $quiz;
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromJson($json) {
    $data = json_decode($json);
    if (is_null($data)) {
      throw new InvalidJsonFactoryException($json);
    }
    $data = (array) $data + [
      'playback' => NULL,
      'images' => [],
      'audio' => [],
      'video' => [],
      'quiz' => NULL,
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
    return new static($data['language'], $data['title'], $data['summary'], $data['desc'], $data['playback'], $data['images'], $data['audio'], $data['video'], $data['quiz']);
  }

  /**
   * {@inheritdoc}
   */
  public function getLanguageCode() {
    return $this->languageCode;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * {@inheritdoc}
   */
  public function getSummary() {
    return $this->summary;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function getPlayback() {
    return $this->playback;
  }

  /**
   * {@inheritdoc}
   */
  public function getImages() {
    return $this->images;
  }

  /**
   * {@inheritdoc}
   */
  public function getAudio() {
    return $this->audio;
  }

  /**
   * {@inheritdoc}
   */
  public function getVideos() {
    return $this->videos;
  }

  /**
   * {@inheritdoc}
   */
  public function getQuiz() {
    return $this->quiz;
  }

}
