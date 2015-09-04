<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\Request\ReviewsRequestInterface
 */
namespace Triquanta\IziTravel\Request;

interface ReviewsRequestInterface extends RequestInterface
{
    /**
     * Set the language in which the reviews should be retrieved.
     *
     * @param $language
     *
     * @return $this
     */
    public function setLanguage($language);
}