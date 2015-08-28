<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\PublisherByUuid.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Requests a publisher's children's languages by UUID.
 */
class PublisherChildrenLanguagesByUuid extends RequestBase implements MultilingualInterface, UuidInterface
{

    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return string[]
     */
    public function execute()
    {
        $json = $this->requestHandler->get('/mtg/publishers/' . $this->uuid . '/children/languages',
          [
            'languages' => $this->languageCodes,
          ]);

        return json_decode($json);
    }

}
