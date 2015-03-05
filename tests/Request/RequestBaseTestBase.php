<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\RequestBaseTestBase.
 */

namespace Triquanta\IziTravel\Tests\Request;

use GuzzleHttp\Client;
use Triquanta\IziTravel\Client\ProductionRequestHandler;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * Provides a base for tests that cover classes that extend
 * \Triquanta\IziTravel\Request\RequestBase.
 */
class RequestBaseTestBase extends \PHPUnit_Framework_TestCase
{

    /**
     * The event dispatcher.
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $eventDispatcher;

    /**
     * The HTTP client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * The request handler.
     *
     * @var \Triquanta\IziTravel\Client\DevelopmentRequestHandler
     */
    protected $requestHandler;

    public function setUp()
    {
        $configuration = TestHelper::getConfiguration();

        $this->eventDispatcher = $this->getMock('\Symfony\Component\EventDispatcher\EventDispatcherInterface');

        $this->httpClient = new Client();

        $this->requestHandler = new ProductionRequestHandler($this->eventDispatcher, $this->httpClient,
          $configuration['apiKey']);
    }

}
