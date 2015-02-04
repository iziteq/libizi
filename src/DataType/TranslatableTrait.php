<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TranslatableInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Implements \Triquanta\IziTravel\DataType\TranslatableInterface.
 */
trait TranslatableTrait
{

    /**
     * The language codes for available translations.
     *
     * @var string[]
     *   Values are ISO 639-1 alpha-2 language codes.
     */
    protected $availableLanguageCodes = [];

    public function getAvailableLanguageCodes()
    {
        return $this->availableLanguageCodes;
    }

}
