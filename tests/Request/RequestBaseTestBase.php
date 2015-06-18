<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\RequestBaseTestBase.
 */

namespace Triquanta\IziTravel\Tests\Request;

use GuzzleHttp\Client;
use Triquanta\IziTravel\Client\StagingRequestHandler;
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
     * The production HTTP client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $productionHttpClient;

    /**
     * The production request handler.
     *
     * @var \Triquanta\IziTravel\Client\ProductionRequestHandler
     */
    protected $productionRequestHandler;

    /**
     * The request handler.
     *
     * @var \Triquanta\IziTravel\Client\RequestHandlerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $requestHandler;

    public function setUp()
    {
        $configuration = TestHelper::getConfiguration();

        $this->eventDispatcher = $this->getMock('\Symfony\Component\EventDispatcher\EventDispatcherInterface');

        $this->productionHttpClient = new Client();

        $this->productionRequestHandler = new StagingRequestHandler($this->eventDispatcher,
          $this->productionHttpClient,
          $configuration['apiKey']);

        $this->requestHandler = $this->getMock('\Triquanta\IziTravel\Client\RequestHandlerInterface');
    }

}
