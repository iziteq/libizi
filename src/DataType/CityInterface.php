<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CityInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a city data type.
 */
interface CityInterface extends FactoryInterface, MultipleFormInterface, PublishableInterface, RevisionableInterface, TranslatableInterface, UuidInterface
{

    /**
     * Gets the map.
     *
     * @return \Triquanta\IziTravel\DataType\MapInterface|null
     */
    public function getMap();

    /**
     * Gets the translations.
     *
     * @return \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[]
     */
    public function getTranslations();

    /**
     * Gets the location.
     *
     * @return \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    public function getLocation();

    /**
     * Returns whether the city is visible in listings.
     *
     * @return bool
     */
    public function isVisible();

}
