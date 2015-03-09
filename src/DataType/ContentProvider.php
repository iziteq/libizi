<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\ContentProviderInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a content provider data type.
 */
class ContentProvider implements ContentProviderInterface
{

    use FactoryTrait;
    use UuidTrait;

    /**
     * The copyright message.
     *
     * @var string|null
     */
    protected $copyrightMessage;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    public static function createFromData(\stdClass $data, $form = null)
    {
        $contentProvider = new static();
        $contentProvider->uuid = $data->uuid;
        $contentProvider->name = $data->name;
        if (isset($data->copyright)) {
            $contentProvider->copyrightMessage = $data->copyright;
        }

        return $contentProvider;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCopyrightMessage()
    {
        return $this->copyrightMessage;
    }

}
