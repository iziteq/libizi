<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\ModifiableInterface.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Defines a request of which sections can be included and excluded.
 */
interface ModifiableInterface
{

    /**
     * Sets included sections.
     *
     * @param string[] $sections
     *
     * @return $this
     */
    public function setIncludes(array $sections);

    /**
     * Sets excluded sections.
     *
     * @param string[] $sections
     *
     * @return $this
     */
    public function setExcludes(array $sections);

}
