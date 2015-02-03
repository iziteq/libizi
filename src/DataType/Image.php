<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Image.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides an image data type.
 */
class Image extends MediaBase
{

    public static function createFromData($data)
    {
        $data = (array) $data + [
            'url' => null,
            'title' => null,
          ];
        if (!isset($data['uuid'])) {
            throw new MissingUuidFactoryException($data);
        }
        return new static($data['uuid'], $data['type'], $data['order'],
          $data['url'], $data['title']);
    }

}
