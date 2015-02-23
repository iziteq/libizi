<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\FormTrait.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Implements \Triquanta\IziTravel\Request\FormInterface.
 */
Trait FormTrait
{

    /**
     * The form.
     *
     * @var string
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::_FORM_*
     * constants.
     */
    protected $form = MultipleFormInterface::FORM_FULL;

    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

}
