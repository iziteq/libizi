<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullPublisherTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\FullPublisher;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullPublisher
 */
class FullPublisherTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullPublisher
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = FullPublisher::createFromJson(TestHelper::getJsonResponse('publisher_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     */
    public function testCreateFromJson()
    {


        FullPublisher::createFromJson(TestHelper::getJsonResponse('publisher_full_include_all'),
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\PublisherBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        FullPublisher::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PublisherContentInterface',
              $content);
        }
    }

    /**
     * @covers ::getContactInformation
     */
    public function testGetContactInformation()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\PublisherContactInformationInterface',
          $this->sut->getContactInformation());
    }

}
