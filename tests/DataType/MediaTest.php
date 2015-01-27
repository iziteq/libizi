<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MediaTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\Media;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\Media
 */
class MediaTest extends \PHPUnit_Framework_TestCase
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
     * @var \Triquanta\IziTravel\DataType\Media
     */
    protected $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->type = Media::TYPE_MAP;
        $this->order = mt_rand();
        $this->duration = mt_rand();
        $this->url = 'http://example.com';
        $this->title = 'Foo to the bar!';
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->sut = new Media($this->uuid, $this->type, $this->order,
          $this->duration, $this->url, $this->title);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "order": 1,
  "type":  "story",
  "uuid":  "37452efa-47d4-4ddf-8110-1b5050c14cff"
}
JSON;

        Media::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        Media::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{
  "order": 1,
  "type":  "story"
}
JSON;

        Media::createFromJson($json);
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame($this->type, $this->sut->getType());
    }

    /**
     * @covers ::getOrder
     */
    public function testGetOrder()
    {
        $this->assertSame($this->order, $this->sut->getOrder());
    }

    /**
     * @covers ::getDuration
     */
    public function testGetDuration()
    {
        $this->assertSame($this->duration, $this->sut->getDuration());
    }

    /**
     * @covers ::getUrl
     */
    public function testGetUrl()
    {
        $this->assertSame($this->url, $this->sut->getUrl());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
        $this->assertSame($this->title, $this->sut->getTitle());
    }

}
