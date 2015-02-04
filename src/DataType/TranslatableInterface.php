<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\TranslatableInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a translatable data type.
 */
interface TranslatableInterface
{

    /**
     * Gets language codes for available translations.
     *
     * @return string[]
     *   Values are ISO 639-1 alpha-2 language codes.
     */
    public function getAvailableLanguageCodes();

}
