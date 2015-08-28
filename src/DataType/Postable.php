<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Postable
 */

namespace Triquanta\IziTravel\DataType;


interface Postable
{

    /**
     * Get the post body in an array of key value pairs.
     *
     * @return string
     *   A json string containing a stdClass
     */
    public function getPostBody();
}