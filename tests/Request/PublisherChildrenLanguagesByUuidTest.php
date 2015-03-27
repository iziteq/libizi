<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\PublisherChildrenLanguagesByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid
 */
class PublisherChildrenLanguagesByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\PublisherChildrenLanguagesByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = PublisherChildrenLanguagesByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = PublisherChildrenLanguagesByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     */
    public function testExecuteRealRequest()
    {
        $this->sut = PublisherChildrenLanguagesByUuid::create($this->productionRequestHandler);

        $uuid = '7d84ef00-f4f6-4b90-89d7-f20207ee9ca6';
        $languageCodes = ['en'];

        $childrenLanguageCodes = $this->sut->setUuid($uuid)
          ->setLanguageCodes($languageCodes)
          ->execute();

        $this->assertInternalType('array', $childrenLanguageCodes);
        // If the request does not return any data, we cannot test its
        // integrity.
        $this->assertNotEmpty($childrenLanguageCodes);
        foreach ($childrenLanguageCodes as $childrenLanguageCode) {
            $this->assertInternalType('string', $childrenLanguageCode);
        }
    }

}
