<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\ContentProviderTest.
 */

namespace Triquanta\IziTravel\Tests;

use Triquanta\IziTravel\ContentProvider;

/**
 * @coversDefaultClass \Triquanta\IziTravel\ContentProvider
 */
class ContentProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The copyright message.
     *
     * @var string
     */
    protected $copyrightMessage;

    /**
     * The name.
     *
     * @var string
     */
    protected $name;

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\ContentProvider
     */
    protected $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->uuid = 'foo-bar-' . mt_rand();
        $this->name = 'Foo Baz';
        $this->copyrightMessage = 'Private property!';

        $this->sut = new ContentProvider($this->uuid, $this->name,
          $this->copyrightMessage);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     */
    public function testCreateFromJson()
    {
        $json = <<<'JSON'
{
  "name": "Sample CP",
  "uuid": "15ad4ee2-ff55-4a86-950d-8dee4c79fc35"
}
JSON;

        ContentProvider::createFromJson($json);
    }

    /**
     * @covers ::__construct
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        ContentProvider::createFromJson($json);
    }

    /**
     * @covers ::createFromJson
     *
     * @expectedException \Triquanta\IziTravel\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{
  "name": "Sample CP"
}
JSON;

        ContentProvider::createFromJson($json);
    }

    /**
     * @covers ::getName
     */
    public function testGetName()
    {
        $this->assertSame($this->name, $this->sut->getName());
    }

    /**
     * @covers ::getCopyrightMessage
     */
    public function testGetCopyrightMessage()
    {
        $this->assertSame($this->copyrightMessage,
          $this->sut->getCopyrightMessage());
    }

}
