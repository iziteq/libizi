<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\PublisherByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CompactPublisher;
use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * Requests a publisher by UUID.
 */
class PublisherByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\PublisherInterface
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/mtg/publishers/' . $this->uuid,
          [
            'languages' => $this->languageCodes,
            'includes' => $this->includes,
            'form' => $this->form,
          ]);
        $data = json_decode($json);
        if ($this->form == MultipleFormInterface::FORM_COMPACT) {
            return CompactPublisher::createFromData($data);
        } else {
            return FullPublisher::createFromData($data);
        }
    }

}
