<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\FormInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines a request with configurable content forms.
 */
interface FormInterface
{

    /**
     * Sets the form of the requested content.
     *
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return $this
     */
    public function setForm($form);

}
