<?php
/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Sponsor
 * @todo: create unit test.
 */

namespace Triquanta\IziTravel\DataType;


class Sponsor implements SponsorInterface
{
    use UuidTrait;

    use FactoryTrait;

    use RevisionableTrait;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    /**
     * The website address.
     *
     * @var string|null
     */
    protected $website;

    /**
     * The order.
     *
     * @var int
     */
    protected $order;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images;

    public static function createFromData(\stdClass $data)
    {
        $sponser = new static();
        $sponser->uuid = $data->uuid;
        $sponser->revisionHash = $data->hash;
        $sponser->name = $data->name;
        $sponser->order = $data->order;
        $sponser->website = $data->website;
        if (isset($data->images)) {
            $sponser->images = [];
            foreach ($data->images as $image_data) {
                $sponser->images[] = Image::createFromJson(json_encode($image_data));
            }

        }
        return $sponser;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getImages()
    {
        return $this->images;
    }

}