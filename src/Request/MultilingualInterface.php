<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MultilingualInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines a request with configurable languages.
 */
interface MultilingualInterface
{

    /**
     * Sets the languages codes of the requested content.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     *
     * @return $this
     */
    public function setLanguageCodes(array $languageCodes);

}
