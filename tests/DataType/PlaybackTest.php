<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PlaybackTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Playback;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Playback
 */
class PlaybackTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

    /**
     * The UUIDs.
     *
     * @var string[]
     */
    protected $uuids = [];

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\Playback
     */
    protected $sut;

    public function setUp()
    {
        $this->type = Playback::TYPE_RANDOM;
        $this->uuids = ['foo-bar-baz-' . mt_rand(), 'foo-bar-qux-' . mt_rand()];

        $this->sut = new Playback($this->type, $this->uuids);
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
  "type": "sequential",
  "order": [
    "3afcd4ab-837f-4055-a8ed-ce43910f9446",
    "7b5092de-43f3-4762-9142-df30529f7942"
  ]
}
JSON;

        Playback::createFromJson($json);
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

        Playback::createFromJson($json);
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame($this->type, $this->sut->getType());
    }

    /**
     * @covers ::getUuids
     */
    public function testGetUuids()
    {
        $this->assertSame($this->uuids, $this->sut->getUuids());
    }

    /**
     * @covers ::isRandom
     */
    public function testIsRandom()
    {
        $playbackRandom = new Playback(Playback::TYPE_RANDOM, $this->uuids);
        $playbackSequential = new Playback(Playback::TYPE_SEQUENTIAL,
          $this->uuids);

        $this->assertTrue($playbackRandom->isRandom());
        $this->assertFalse($playbackSequential->isRandom());
    }

    /**
     * @covers ::isSequential
     */
    public function testIsSequential()
    {
        $playbackRandom = new Playback(Playback::TYPE_RANDOM, $this->uuids);
        $playbackSequential = new Playback(Playback::TYPE_SEQUENTIAL,
          $this->uuids);

        $this->assertFalse($playbackRandom->isSequential());
        $this->assertTrue($playbackSequential->isSequential());
    }

}
