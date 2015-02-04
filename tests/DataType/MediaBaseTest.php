<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\MediaTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MediaInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\MediaBase
 */
class MediaBaseTest extends \PHPUnit_Framework_TestCase
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
     * @var \Triquanta\IziTravel\DataType\MediaBase
     */
    protected $sut;

    public function setUp()
    {
        $this->type = MediaInterface::TYPE_MAP;
        $this->order = mt_rand();
        $this->url = 'http://example.com';
        $this->title = 'Foo to the bar!';
        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->sut = $this->getMockBuilder('\Triquanta\IziTravel\DataType\MediaBase')
          ->setConstructorArgs([
            $this->uuid,
            $this->type,
            $this->order,
            $this->url,
            $this->title
          ])
          ->getMockForAbstractClass();
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
