<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PlayableMediaBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PlayableMediaBase
 */
class PlayableMediaBaseTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
    "uuid" : "d2cea5b6-a781-4d67-be7b-7c46f034e6ae",
    "type" : "story",
    "duration" : 44,
    "order" : 1,
    "hash" : "89754396ad760e91985c622ecb0acce5",
    "size" : 365477
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PlayableMediaBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\PlayableMediaBase');
        /** @var \Triquanta\IziTravel\DataType\PlayableMediaBase $class */
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
        /** @var \Triquanta\IziTravel\DataType\PlayableMediaBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getDuration
     */
    public function testGetDuration()
    {
        $this->assertSame(44, $this->sut->getDuration());
    }

}
