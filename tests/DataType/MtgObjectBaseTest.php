<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MtgObjectBase;
use Triquanta\IziTravel\DataType\MtgObjectInterface;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\MtgObjectBase
 */
class MtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\MtgObjectBase|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\MtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('tour_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     * @covers ::getClassMap
     */
    public function testCreateFromJson()
    {
        // Story navigation.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullStoryNavigationInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('story_navigation_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactStoryNavigationInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('story_navigation_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
        // Tourist attraction.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullTouristAttractionInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('tourist_attraction_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactTouristAttractionInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('tourist_attraction_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
        // Museum.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullMuseumInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('museum_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactMuseumInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('museum_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
        // Tour.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullTourInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('tour_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactTourInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('tour_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
        // Exhibit.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullExhibitInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('exhibit_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactExhibitInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('exhibit_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
        // Collection.
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\FullCollectionInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('collection_full_include_all'),
            MultipleFormInterface::FORM_FULL));
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CompactCollectionInterface',
          MtgObjectBase::createFromJson(TestHelper::getJsonResponse('collection_compact_include_all'),
            MultipleFormInterface::FORM_COMPACT));
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers ::getClassMap
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\MtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getAvailableLanguageCodes
     */
    public function testGetAvailableLanguageCodes()
    {
        $this->assertSame(['sv', 'en'],
          $this->sut->getAvailableLanguageCodes());
    }

    /**
     * @covers ::isPublished
     */
    public function testIsPublished()
    {
        $this->assertTrue($this->sut->isPublished());
    }

    /**
     * @covers ::getLocation
     */
    public function testGetLocation()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\LocationInterface',
          $this->sut->getLocation());
    }

    /**
     * @covers ::getTriggerZones
     */
    public function testGetTriggerZones()
    {
        $this->assertInternalType('array', $this->sut->getTriggerZones());
        foreach ($this->sut->getTriggerZones() as $triggerZone) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\TriggerZoneInterface',
              $triggerZone);
        }
    }

    /**
     * @covers ::getContentProvider
     */
    public function testGetContentProvider()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ContentProviderInterface',
          $this->sut->getContentProvider());
    }

    /**
     * @covers ::getPublisher
     */
    public function testGetPublisher()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PublisherInterface',
          $this->sut->getPublisher());
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame(MtgObjectInterface::TYPE_TOUR, $this->sut->getType());
    }

    /**
     * @covers ::getCity
     */
    public function testGetCity()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CityInterface',
          $this->sut->getCity());
    }

    /**
     * @covers ::getCountry
     */
    public function testGetCountry()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\CountryInterface',
          $this->sut->getCountry());
    }

}
