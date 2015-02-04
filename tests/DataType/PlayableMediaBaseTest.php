<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PlayableMediaBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MediaInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PlayableMediaBase
 */
class PlayableMediaBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The type.
     *
     * @var string
     *   One of the static::TYPE_* constants.
     */
    protected $type;

    /**
     * The order.
     *
     * @var int
     */
    protected $order;

    /**
     * The duration.
     *
     * @var int
     *   The duration in seconds.
     */
    protected $duration;

    /**
     * The URL.
     *
     * @var string|null
     */
    protected $url;

    /**
     * The title.
     *
     * @var string|null
     */
    protected $title;

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\PlayableMediaBase
     */
    protected $sut;

    public function setUp()
    {
        $this->type = MediaInterface::TYPE_MAP;
        $this->order = mt_rand();
        $this->duration = mt_rand();
        $this->url = 'http://example.com';
        $this->title = 'Foo to the bar!';
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->sut = $this->getMockBuilder('\Triquanta\IziTravel\DataType\PlayableMediaBase')
          ->setConstructorArgs([
            $this->uuid,
            $this->type,
            $this->order,
            $this->url,
            $this->title,
            $this->duration
          ])
          ->getMockForAbstractClass();
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

        /** @var \Triquanta\IziTravel\DataType\PlayableMediaBase $class */
        $class = get_class($this->sut);
        $class::createFromJson($json);
    }

    /**
     * @covers ::getDuration
     */
    public function testGetDuration()
    {
        $this->assertSame($this->duration, $this->sut->getDuration());
    }

}
