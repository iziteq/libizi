<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PlaybackTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\Playback;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Playback
 */
class PlaybackTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "type": "sequential",
  "order": [
    "3afcd4ab-837f-4055-a8ed-ce43910f9446",
    "7b5092de-43f3-4762-9142-df30529f7942"
  ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Playback
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = Playback::createFromJson($this->json,
          MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        Playback::createFromJson($this->json, MultipleFormInterface::FORM_FULL);
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

        Playback::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame('sequential', $this->sut->getType());
    }

    /**
     * @covers ::getUuids
     */
    public function testGetUuids()
    {
        $this->assertSame([
          '3afcd4ab-837f-4055-a8ed-ce43910f9446',
          '7b5092de-43f3-4762-9142-df30529f7942'
        ], $this->sut->getUuids());
    }

    /**
     * @covers ::isRandom
     */
    public function testIsRandom()
    {
        $this->assertFalse($this->sut->isRandom());
    }

    /**
     * @covers ::isSequential
     */
    public function testIsSequential()
    {
        $this->assertTrue($this->sut->isSequential());
    }

}
