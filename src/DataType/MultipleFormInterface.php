<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\MultipleFormInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines an object that can appear in multiple forms.
 */
interface MultipleFormInterface
{

    /**
     * An object in full form.
     */
    const FORM_FULL = 'full';

    /**
     * An object in compact form.
     */
    const FORM_COMPACT = 'compact';

}
