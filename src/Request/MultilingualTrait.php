<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MultilingualTrait.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Implements \Triquanta\IziTravel\Request\MultilingualInterface.
 */
Trait MultilingualTrait
{

    /**
     * The language codes.
     *
     * @var string[]
     *   An array of ISO 639-1 alpha-2 language codes.
     */
    protected $languageCodes = [];

    public function setLanguageCodes(array $languageCodes)
    {
        $this->languageCodes = implode(',',$languageCodes);

        return $this;
    }

}
