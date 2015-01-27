<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Client\ErrorResponseTest.
 */

namespace Triquanta\IziTravel\Tests\Client;

use Triquanta\IziTravel\Client\ErrorResponse;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Client\ErrorResponse
 */
class ErrorResponseTest extends \PHPUnit_Framework_TestCase {

    /**
     * The HTTP response code.
     *
     * @var int
     */
    protected $httpResponseCode;

    /**
     * The error message.
     *
     * @var string
     */
    protected $errorMessage;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Client\ErrorResponse
     */
    protected $sut;

    public function setUp()
    {
        $this->httpResponseCode = mt_rand(100, 999);

        $this->errorMessage = 'Error code: ' . mt_rand();

        $this->sut = new ErrorResponse($this->httpResponseCode, $this->errorMessage);
    }

    /**
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = new ErrorResponse($this->httpResponseCode, $this->errorMessage);
    }

    /**
     * @covers ::getHttpResponseCode
     */
    public function testGetHttpResponseCode() {
        $this->assertSame($this->httpResponseCode, $this->sut->getHttpResponseCode());
    }

    /**
     * @covers ::getErrorMessage
     */
    public function testGetErrorMessage() {
        $this->assertSame($this->errorMessage, $this->sut->getErrorMessage());
    }

}
