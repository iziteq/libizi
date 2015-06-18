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

    protected $json = <<<'JSON'
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
    "promoted": false,
    "position": 7
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FeaturedContentBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FeaturedContentBase');
        /** @var \Triquanta\IziTravel\DataType\FeaturedContentBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        /** @var \Triquanta\IziTravel\DataType\FeaturedContentBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
    }

    /**
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
        $class::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::isPromoted
     */
    public function testIsPromoted()
    {
        $this->assertFalse($this->sut->isPromoted());
    }

    /**
     * @covers ::getRequestedLanguageCode
     */
    public function testGetRequestedLanguageCode()
    {
        $this->assertSame('nl', $this->sut->getRequestedLanguageCode());
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
        $this->assertSame('en', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertSame('Amsterdam', $this->sut->getName());
    }

    /**
     * @covers ::getDescription
     */
    public function testGetDescription()
    {
        $this->assertSame('Amsterdam is een van de meest populaire toeristische bestemmingen van Europa. Neem de historische stadswandeling langs de Amsterdamse grachten, bezoek fantastische musea zoals het van Goghmuseum of het Rijksmuseum en het Anne Frank Huis. Dwaal over de Wallen. Hier is voor ieder wat wils - kom op, we gaan!',
          $this->sut->getDescription());
    }

    /**
     * @covers ::getPosition
     */
    public function testGetPosition()
    {
        $this->assertSame(7, $this->sut->getPosition());
    }

    /**
     * @covers ::getImages
     */
    public function testGetImages()
    {
        $this->assertInternalType('array', $this->sut->getImages());
        foreach ($this->sut->getImages() as $image) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FeaturedContentImageBase',
              $image);
        }
    }

}
