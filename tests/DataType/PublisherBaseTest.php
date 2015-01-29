<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\PublisherBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CityInterface;
use Triquanta\IziTravel\DataType\PublisherInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\PublisherBase
 */
class PublisherBaseTest extends \PHPUnit_Framework_TestCase
{

  /**
   * The UUID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The revision hash.
   *
   * @var string
   */
  protected $revisionHash;

  /**
   * The language codes for available translations.
   *
   * @var string[]
   *   Values are ISO 639-1 alpha-2 language codes.
   */
  protected $availableLanguageCodes = [];

  /**
   * The status.
   *
   * @var string
   */
  protected $status;

  /**
   * The content provider.
   *
   * @var \Triquanta\IziTravel\DataType\ContentProviderInterface
   */
  protected $contentProvider;

  /**
   * The class under test.
   *
   * @var \Triquanta\IziTravel\DataType\PublisherBase|\PHPUnit_Framework_MockObject_MockObject
   */
  protected $sut;

  public function setUp()
  {
    $this->uuid = 'foo-bar-baz-' . mt_rand();

    $this->revisionHash = 'hkgo8wt0924898quflknt2846';

    $this->availableLanguageCodes = ['nl', 'uk'];

    $this->status = PublisherInterface::STATUS_PUBLISHED;

    $this->contentProvider = $this->getMock('\Triquanta\IziTravel\DataType\ContentProviderInterface');

    $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\PublisherBase',
      [
        $this->uuid,
        $this->revisionHash,
        $this->availableLanguageCodes,
        $this->contentProvider,
        $this->status,
      ]);
  }

  /**
   * @covers ::__construct
   */
  public function test__Construct()
  {
    $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\PublisherBase',
      [
        $this->uuid,
        $this->revisionHash,
        $this->availableLanguageCodes,
        $this->contentProvider,
        $this->status,
      ]);
  }

  /**
   * @covers ::getContentProvider
   */
  public function testGetContentProvider()
  {
    $this->assertSame($this->contentProvider, $this->sut->getContentProvider());
  }

  /**
   * @covers ::isPublished
   */
  public function testIsPublished()
  {
    $this->assertTrue($this->sut->isPublished());
  }

}
