<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\Search.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CityBase;
use Triquanta\IziTravel\DataType\CountryBase;
use Triquanta\IziTravel\DataType\MtgObjectBase;
use Triquanta\IziTravel\DataType\MtgObjectInterface;

/**
 * Requests featured content.
 */
class Search extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface
{

    use FormTrait;
    use LimitTrait;
    use ModifiableTrait;
    use MultilingualTrait;

    /**
     * The region.
     *
     * @var string
     *   The UUID of a city or country.
     */
    protected $region;


    /**
     * The sort.
     *
     * @var string
     *   The field to sort by and the direction ("asc", or "desc"), separated by a
     *   colon.
     */
    protected $sort = 'popularity:desc';

    /**
     * The content types.
     *
     * @var string[]
     *   An array of \Triquanta\IziTravel\DataType\MtgObjectInterface::TYPE_*
     *   constants, and/or "city", and/or "country".
     */
    protected $types = [
      MtgObjectInterface::TYPE_TOUR,
      MtgObjectInterface::TYPE_MUSEUM
    ];

    /**
     * The search query.
     *
     * @var string
     */
    protected $query;

    /**
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface[]|\Triquanta\IziTravel\DataType\CityInterface[]|\Triquanta\IziTravel\DataType\CountryInterface[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/mtg/objects/search/', [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
          'sort_by' => $this->sort,
          'type' => $this->types,
          'query' => $this->query,
          'limit' => $this->limit,
          'offset' => $this->offset,
          'region' => $this->region,
        ]);
        $data = json_decode($json);
        $objects = [];
        foreach ($data as $objectData) {
            if ($objectData->type === 'city') {
                $objects[] = CityBase::createFromJson(json_encode($objectData),
                  $this->form);
            } elseif ($objectData->type === 'country') {
                $objects[] = CountryBase::createFromJson(json_encode($objectData),
                  $this->form);
            } else {
                $objects[] = MtgObjectBase::createFromJson(json_encode($objectData),
                  $this->form);
            }
        }

        return $objects;
    }

    /**
     * Sets the sort.
     *
     * @param string $field
     * @param string $order
     *   Either "asc" or "desc".
     *
     * @return static
     */
    public function setSort($field, $order)
    {
        $this->sort = $field . ':' . $order;

        return $this;
    }

    /**
     * Sets the requested content types.
     *
     * @param string[] $types
     *   An array of \Triquanta\IziTravel\DataType\MtgObjectInterface::TYPE_*
     *   constants, and/or "city", and/or "country".
     *
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Sets the search query.
     *
     * @param string $query
     *
     * @return $this
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Sets the region.
     *
     * @param string $region
     *   The UUID of a city or country.
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

}
