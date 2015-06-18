<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Client\ClientTest.
 */

namespace Triquanta\IziTravel\Tests\Client;

use GuzzleHttp\Client as HttpClient;
use Triquanta\IziTravel\Client\Client;
use Triquanta\IziTravel\Client\ProductionRequestHandler;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Client\Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The event dispatcher.
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $eventDispatcher;

    /**
     * The HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * The request handler.
     *
     * @var \Triquanta\IziTravel\Client\DevelopmentRequestHandler
     */
    protected $requestHandler;

    /**
     * @var \Triquanta\IziTravel\Client\Client
     */
    protected $sut;

    public function setUp()
    {
        $configuration = TestHelper::getConfiguration();

        $this->eventDispatcher = $this->getMock('\Symfony\Component\EventDispatcher\EventDispatcherInterface');

        $this->httpClient = new HttpClient();

        $this->requestHandler = new ProductionRequestHandler($this->eventDispatcher,
          $this->httpClient,
          $configuration['apiKey']);

        $this->sut = new Client($this->requestHandler);
    }

    /**
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = new Client($this->requestHandler);
    }

    /**
     * @covers ::getMtgObjectByUuid
     */
    public function testGetMtgObjectByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\MtgObjectByUuid',
          $this->sut->getMtgObjectByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getMtgObjectsByUuids
     */
    public function testGetMtgObjectsByUuids()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuids = [
          'bcf57367-77f6-4e39-9da6-1b481826501f',
          '9a7d0fd4-aa50-4d12-a8fa-26f080cd7e0c'
        ];
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\MtgObjectsByUuids',
          $this->sut->getMtgObjectsByUuids($languageCodes, $uuids));
    }

    /**
     * @covers ::getMtgObjectChildrenByUuid
     */
    public function testGetMtgObjectChildrenByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\MtgObjectChildrenByUuid',
          $this->sut->getMtgObjectChildrenByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getCountryByUuid
     */
    public function testGetCountryByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '69929d8f-ba82-49b2-88fe-e5a0c687caca';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\CountryByUuid',
          $this->sut->getCountryByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getCountries
     */
    public function testGetCountriesInCompactForm()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\Countries',
          $this->sut->getCountries($languageCodes));
    }

    /**
     * @covers ::getCountryChildrenByUuid
     */
    public function testGetCountryChildrenByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '69929d8f-ba82-49b2-88fe-e5a0c687caca';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\CountryChildrenByUuid',
          $this->sut->getCountryChildrenByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getCityByUuid
     */
    public function testGetCityByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '3f879f37-21b0-479d-bd74-aa26f72fa328';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\CityByUuid',
          $this->sut->getCityByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getCities
     */
    public function testGetCities()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\Cities',
          $this->sut->getCities($languageCodes));
    }

    /**
     * @covers ::getCityChildrenByUuid
     */
    public function testGetCityChildrenByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '3f879f37-21b0-479d-bd74-aa26f72fa328';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\CityChildrenByUuid',
          $this->sut->getCityChildrenByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getCitiesByCountryUuid
     */
    public function testGetCitiesByCountryUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '69929d8f-ba82-49b2-88fe-e5a0c687caca';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\CitiesByCountryUuid',
          $this->sut->getCitiesByCountryUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getPublisherByUuid
     */
    public function testGetPublisherByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '7d84ef00-f4f6-4b90-89d7-f20207ee9ca6';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\PublisherByUuid',
          $this->sut->getPublisherByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getPublisherChildrenByUuid
     */
    public function testGetPublisherChildrenByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '7d84ef00-f4f6-4b90-89d7-f20207ee9ca6';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\PublisherChildrenByUuid',
          $this->sut->getPublisherChildrenByUuid($languageCodes, $uuid));
    }

    /**
     * @covers ::getPublisherChildrenLanguagesByUuid
     */
    public function testGetPublisherChildrenLanguagesByUuid()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $uuid = '7d84ef00-f4f6-4b90-89d7-f20207ee9ca6';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid',
          $this->sut->getPublisherChildrenLanguagesByUuid($languageCodes,
            $uuid));
    }

    /**
     * @covers ::search
     */
    public function testSearch()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $query = 'Famous clock towers in Lviv';
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\Search',
          $this->sut->search($languageCodes, $query));
    }

    /**
     * @covers ::getFeaturedContent
     */
    public function testGetFeaturedContent()
    {
        $languageCodes = ['en', 'uk', 'nl'];
        $this->assertInstanceOf('\Triquanta\IziTravel\Request\FeaturedContent',
          $this->sut->getFeaturedContent($languageCodes));
    }

}
