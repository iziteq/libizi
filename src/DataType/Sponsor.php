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
     * The hash.
     *
     * @var string
     */
    protected $hash;

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
        $sponser->hash = $data->hash;
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

    public function getHash()
    {
        return $this->hash;
    }
}