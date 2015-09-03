<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PagingTrait
 */

namespace Triquanta\IziTravel\DataType;


trait PagingTrait
{
    /**
     * The number of individual records that are returned in each page.
     *
     * @var int
     */
    protected $limit = 0;

    /**
     * The number of returned records in section data. Values: [0..limit].
     *
     * @var int
     */
    protected $returnedCount = 0;

    /**
     * The total number of review records for the content at request time.
     *
     * @var int
     */
    protected $totalCount = 0;

    public function getLimit()
    {
        return $this->limit;
    }

    public function getReturnedCount()
    {
        return $this->returnedCount;
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }
}