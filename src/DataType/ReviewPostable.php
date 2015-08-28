<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ReviewPostable
 */

namespace Triquanta\IziTravel\DataType;


class ReviewPostable extends Review implements ReviewPostableInterface
{

    protected $contentHash;

    protected $contentUuid;

    public function getPostBody()
    {
        /**
         * Create the body variables for this request.
         */
        $body = array();
        $body['lang'] = $this->languageCode;
        $body['hash'] = $this->contentHash;
        if (isset($this->rating)) {
            $body['rating'] = $this->rating;
        }
        if (isset($this->reviewText)) {
            $body['review'] = $this->reviewText;
        }
        if (isset($this->reviewName)) {
            $body['reviewer_name'] = $this->reviewName;
        }
        // The body must be a json string containing a stdClass.
        $bodyObject = (object) $body;
        $bodyString = json_encode($bodyObject);
        return $bodyString;
    }

    public function getContentHash()
    {
        return $this->contentHash;
    }

    public function setContentHash($hash)
    {
        $this->contentHash = $hash;
    }

    public function setLanguage($language)
    {
        $this->languageCode = $language;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;
    }

    public function setReviewName($name)
    {
        $this->reviewName = $name;
    }

    public function getContentUuid()
    {
        return $this->contentUuid;
    }

    public function setContentUuid($contentUuid)
    {
        $this->contentUuid = $contentUuid;
    }
}