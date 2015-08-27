<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContentInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a content data type.
 */
interface ContentInterface extends FactoryInterface
{

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
     * Gets the news.
     *
     * @return string
     */
    public function getNews();

    /**
     * Gets the playback.
     *
     * @return \Triquanta\IziTravel\DataType\PlaybackInterface|null
     */
    public function getPlayback();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

    /**
     * Gets the audio media.
     *
     * @return \Triquanta\IziTravel\DataType\AudioInterface[]
     */
    public function getAudio();

    /**
     * Gets the videos.
     *
     * @return \Triquanta\IziTravel\DataType\VideoInterface[]
     */
    public function getVideos();

    /**
     * Gets the child objects.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getChildren();

    /**
     * Gets the collections.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getCollections();

    /**
     * Gets the references.
     *
     * @return \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    public function getReferences();

    /**
     * Gets the quiz.
     *
     * @return \Triquanta\IziTravel\DataType\QuizInterface|null
     */
    public function getQuiz();

}
