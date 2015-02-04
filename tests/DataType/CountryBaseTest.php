<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CountryBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CountryInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CountryBase
 */
class CountryBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The revision hash.
     *
     * @var string
     */
    protected $revisionHash;

    /**
     * The language codes for available translations.
     *
     * @var string[]
     *   Values are ISO 639-1 alpha-2 language codes.
     */
    protected $availableLanguageCodes = [];

    /**
     * The country code.
     *
     * @var string|null
     *   An ISO 3166-1 alpha-2 country code.
     */
    protected $countryCode;

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The map.
     *
     * @var \Triquanta\IziTravel\DataType\MapInterface|null
     */
    protected $map;

    /**
     * The translations.
     *
     * @var \Triquanta\IziTravel\DataType\CountryCityTranslationInterface[]
     */
    protected $translations = [];

    /**
     * The location.
     *
     * @var \Triquanta\IziTravel\DataType\LocationInterface|null
     */
    protected $location;

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CountryBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->revisionHash = 'hwg98309t82ohtwqlekhgf0823yt';

        $this->availableLanguageCodes = ['nl', 'uk'];

        $this->countryCode = 'UA';

        $this->languageCode = 'uk';

        $this->map = $this->getMock('\Triquanta\IziTravel\DataType\MapInterface');

        $this->translations = [
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
          $this->getMock('\Triquanta\IziTravel\DataType\CountryCityTranslationInterface'),
        ];

        $this->status = CountryInterface::STATUS_PUBLISHED;

        $this->location = $this->getMock('\Triquanta\IziTravel\DataType\LocationInterface');

        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CountryBase',
          [
            $this->uuid,
            $this->revisionHash,
            $this->availableLanguageCodes,
            $this->countryCode,
            $this->map,
            $this->translations,
            $this->location,
            $this->status
          ]);
    }

    /**
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\CountryBase',
          [
            $this->uuid,
            $this->revisionHash,
            $this->availableLanguageCodes,
            $this->countryCode,
            $this->map,
            $this->translations,
            $this->location,
            $this->status
          ]);
    }

    /**
     * @covers ::getCountryCode
     */
    public function testGetCountryCode()
    {
        $this->assertSame($this->countryCode, $this->sut->getCountryCode());
    }

    /**
     * @covers ::getMap
     */
    public function testGetMap()
    {
        $this->assertSame($this->map, $this->sut->getMap());
    }

    /**
     * @covers ::getTranslations
     */
    public function testGetTranslations()
    {
        $this->assertSame($this->translations, $this->sut->getTranslations());
    }

    /**
     * @covers ::getLocation
     */
    public function testGetLocation()
    {
        $this->assertSame($this->location, $this->sut->getLocation());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
        $this->assertTrue($this->sut->isPublished());
    }

}
