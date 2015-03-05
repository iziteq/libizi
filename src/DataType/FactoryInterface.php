<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FactoryInterface.
 */

namespace Triquanta\IziTravel\DataType;

interface FactoryInterface
{

    /**
     * Creates a new instances from izi.TRAVEL's API's JSON output.
     *
     * @param string $json
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\DataType\FactoryException
     */
    public static function createFromJson($json, $form);

    /**
     * Creates a new instances from izi.TRAVEL's API's decoded JSON output.
     *
     * @param \stdClass $data
     * @param string $form
     *   One of the \Triquanta\IziTravel\DataType\MultipleFormInterface::FORM_*
     *   constants.
     *
     * @return static
     *
     * @throws \Triquanta\IziTravel\DataType\FactoryException
     */
    public static function createFromData(\stdClass $data, $form);

}
