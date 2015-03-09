<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FeaturedMtgObjectBase.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a featured MTG Object.
 */
abstract class FeaturedMtgObjectBase extends FeaturedContentBase implements FeaturedMtgObjectInterface
{

    /**
     * The UUID of the city this content belongs to.
     *
     * @var string|null
     */
    protected $cityUuid;

    /**
     * The UUID of the country this content belongs to.
     *
     * @var string|null
     */
    protected $countryUuid;

    public static function createFromData(\stdClass $data)
    {
        /** @var static $object */
        $object = parent::createFromData($data);
        $object->cityUuid = $data->city_uuid;
        $object->countryUuid = $data->country_uuid;

        return $object;
    }

    public function getCityUuid()
    {
        return $this->cityUuid;
    }

    public function getCountryUuid()
    {
        return $this->countryUuid;
    }

}
