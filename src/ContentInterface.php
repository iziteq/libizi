<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\ContentInterface.
 */

namespace Triquanta\IziTravel;

/**
 * Defines a content data type.
 */
interface ContentInterface extends FactoryInterface {

  /**
   * Gets the language.
   *
   * @return string
   *   An ISO 639-1 alpha-2 language code.
   */
  public function getLanguageCode();

  /**
   * Gets the title.
   *
   * @return string
   */
  public function getTitle();

  /**
   * Gets the summary.
   *
   * @return string
   */
  public function getSummary();

  /**
   * Gets the description.
   *
   * @return string
   */
  public function getDescription();

  /**
   * Gets the playback.
   *
   * @return \Triquanta\IziTravel\PlaybackInterface|null
   */
  public function getPlayback();

  /**
   * Gets the images.
   *
   * @return \Triquanta\IziTravel\MediaInterface[]
   */
  public function getImages();

  /**
   * Gets the audio media.
   *
   * @return \Triquanta\IziTravel\MediaInterface[]
   */
  public function getAudio();

  /**
   * Gets the videos.
   *
   * @return \Triquanta\IziTravel\MediaInterface[]
   */
  public function getVideos();

  /**
   * Gets the child objects.
   *
   * @return \Triquanta\IziTravel\CompactMtgObjectInterface[]
   */
  public function getChildren();

  /**
   * Gets the collections.
   *
   * @return \Triquanta\IziTravel\CompactMtgObjectInterface[]
   */
  public function getCollections();

  /**
   * Gets the references.
   *
   * @return \Triquanta\IziTravel\CompactMtgObjectInterface[]
   */
  public function getReferences();

  /**
   * Gets the quiz.
   *
   * @return \Triquanta\IziTravel\QuizInterface|null
   */
  public function getQuiz();

}
