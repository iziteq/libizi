<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FeaturedContentBaseTest.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FeaturedContentBase
 */
class FeaturedContentBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The status.
     *
     * @var string
     *   One of the \Triquanta\IziTravel\DataType\PublishableInterface::STATUS_*
     *   constants.
     */
    protected $status;

    /**
     * Whether the object is promoted.
     *
     * @var bool
     */
    protected $promoted;

    /**
     * The code of the language in which the object was requested.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $requestedLanguageCode;

    /**
     * The content's language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * The description.
     *
     * @var string|null
     */
    protected $description;

    /**
     * The position (order).
     *
     * @var int|null
     */
    protected $position;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\FeaturedContentImageInterface[]|\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface[]
     */
    protected $images = [];

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FeaturedContentBase
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->status = array_rand([
          PublishableInterface::STATUS_PUBLISHED,
          PublishableInterface::STATUS_LIMITED
        ]);

        $this->promoted = (bool) mt_rand(0, 1);

        $this->requestedLanguageCode = 'uk';

        $this->languageCode = 'uk';

        $this->name = 'Foo ' . mt_rand();

        $this->description = 'Foo & Bar, episode' . mt_rand();

        $this->position = mt_rand(1, 5);

        $this->images = [
          $this->getMock('\Triquanta\IziTravel\DataType\FeaturedContentImageInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\FeaturedContentCoverImageInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\FeaturedContentImageInterface'),
        ];

        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FeaturedContentBase',
          [
            $this->uuid,
            $this->status,
            $this->promoted,
            $this->requestedLanguageCode,
            $this->languageCode,
            $this->name,
            $this->description,
            $this->position,
            $this->images,
          ]);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
    "uuid": "3f879f37-21b0-479d-bd74-aa26f72fa328",
    "name": "Amsterdam",
    "status": "published",
    "type": "city",
    "description": "Amsterdam is een van de meest populaire toeristische bestemmingen van Europa. Neem de historische stadswandeling langs de Amsterdamse grachten, bezoek fantastische musea zoals het van Goghmuseum of het Rijksmuseum en het Anne Frank Huis. Dwaal over de Wallen. Hier is voor ieder wat wils - kom op, we gaan!",
    "language": "nl",
    "content_language": "en",
    "images": [
        {
            "uuid": "33f074c6-ae37-4ee2-8208-c7065029edb4",
            "type": "image"
        },
        {
            "uuid": "229499af-2262-493e-8851-eb9e4b1d5c85",
            "type": "cover"
        }
    ],
    "promoted": false
}
JSON;

        /** @var \Triquanta\IziTravel\DataType\FeaturedContentBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\FeaturedContentBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{
  "email": "john@doe.com",
  "custom": {
    "check": "w00t"
  }
}
JSON;

        /** @var \Triquanta\IziTravel\DataType\FeaturedContentBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json);
    }

    /**
     * @covers ::isPromoted
     */
    public function testIsPromoted()
    {
        $this->assertSame($this->promoted, $this->sut->isPromoted());
    }

    /**
     * @covers ::getRequestedLanguageCode
     */
    public function testGetRequestedLanguageCode()
    {
        $this->assertSame($this->requestedLanguageCode,
          $this->sut->getRequestedLanguageCode());
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame($this->languageCode, $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertSame($this->name, $this->sut->getName());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame($this->description, $this->sut->getDescription());
    }

    /**
     * @covers ::getPosition
     */
    public function testGetPosition()
    {
        $this->assertSame($this->position, $this->sut->getPosition());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertSame($this->images, $this->sut->getImages());
    }

}
