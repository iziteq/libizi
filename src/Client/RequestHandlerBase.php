<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\RequestHandler.
 */

namespace Triquanta\IziTravel\Client;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Message\RequestInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Triquanta\IziTravel\ApiInterface;
use Triquanta\IziTravel\Event\IziTravelEvents;
use Triquanta\IziTravel\Event\PostResponse;
use Triquanta\IziTravel\Event\PreRequest;

/**
 * Provides an handler for making API requests.
 *
 * Instances of this class are stateless, which means they can be used to make
 * multiple requests.
 */
abstract class RequestHandlerBase implements RequestHandlerInterface
{

    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The event dispatcher.
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * The HTTP client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

    /**
     * The password.
     *
     * @var string|null
     */
    protected $password;

    /**
     * Constructs a new instance.
     *
     * @param \GuzzleHttp\ClientInterface $httpClient
     * @param string $apiKey
     *   The MTG API key.
     */
    public function __construct(
      EventDispatcherInterface $eventDispatcher,
      HttpClientInterface $httpClient,
      $apiKey,
      $password = null
    ) {
        $this->apiKey = $apiKey;
        $this->eventDispatcher = $eventDispatcher;
        $this->httpClient = $httpClient;
        $this->password = $password;
    }

    /**
     * Old function to perform a get request. Deprecated.
     *
     * @deprecated
     * @param string $urlPath
     * @param array $parameters
     * @return string
     * @throws \Triquanta\IziTravel\Client\ErrorResponseException
     * @throws \Triquanta\IziTravel\Client\HttpRequestException
     */
    public function request($urlPath, array $parameters = [])
    {
        return $this->get($urlPath, $parameters);
    }

    public function get($urlPath, array $parameters = [])
    {
        $request = $this->httpClient->createRequest('GET');
        $url = rtrim($this->getBaseUrl(), '/') . '/' . trim($urlPath, '/');
        $request->setUrl($url);
        // Set the API key in a header instead of a URL parameter, so it will
        // not accidentally end up in log messages.
        $request->setHeader('X-IZI-API-KEY', $this->apiKey);

        // Set compression in the header.
        $this->addCompression($request);

        if ($this->password) {
            $parameters['password'] = $this->password;
        }
        $parameters['version'] = ApiInterface::VERSION;
        $request->getQuery()->replace($parameters);
        $request->getQuery()->setAggregator(static::getGuzzleQueryAggregator());
        $pre_request_event = new PreRequest($request);
        $this->eventDispatcher->dispatch(IziTravelEvents::PRE_REQUEST,
          $pre_request_event);
        try {
            $response = $this->httpClient->send($request);
            $post_response_event = new PostResponse($response);
            $this->eventDispatcher->dispatch(IziTravelEvents::POST_RESPONSE,
              $post_response_event);
            $json = $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new HttpRequestException(sprintf('An exception was thrown during the API request to %s: %s',
              $request->getUrl(), $e->getMessage()), 0, $e);
        }

        $responseData = json_decode($json);
        if (json_last_error()) {
            throw new HttpRequestException(sprintf('The request to %s did not return valid JSON.',
              $request->getUrl()));
        } elseif (is_array($responseData) && isset($responseData['error'])) {
            throw new ErrorResponseException($responseData['error'],
              $responseData['code']);
        } else {
            return $json;
        }
    }

    public function post($urlPath, array $parameters = [], $body)
    {
        $request = $this->httpClient->createRequest('POST', array(), array('body' => $body));
        $url = rtrim($this->getBaseUrl(), '/') . '/' . trim($urlPath, '/');
        $request->setUrl($url);
        // Set the API key in a header instead of a URL parameter, so it will
        // not accidentally end up in log messages.
        $request->setHeader('X-IZI-API-KEY', $this->apiKey);

        // Add compression.
        $this->addCompression($request);

        // Add content type.
        if ($parameters['content_type']) {
          $request->setHeader('Content-Type', $parameters['content_type']);
        }

        // For some strange reason, for the first post request (reviews)
        // we need to add the api-key to the url.
        // It might change, so when that is happening, you are free to alter this here.
        // Mind to test the posting of reviews again if you change it.
        // Fix also Api Key in URL (SRV-9750) by removing
        //$parameters['api_key'] = $this->apiKey;
        $parameters['version'] = ApiInterface::VERSION;
        $request->getQuery()->replace($parameters);
        $request->getQuery()->setAggregator(static::getGuzzleQueryAggregator());

        $pre_request_event = new PreRequest($request);
        $this->eventDispatcher->dispatch(IziTravelEvents::PRE_REQUEST,
          $pre_request_event);
        try {
            $response = $this->httpClient->send($request);
            $post_response_event = new PostResponse($response);
            $this->eventDispatcher->dispatch(IziTravelEvents::POST_RESPONSE,
              $post_response_event);
            $json = $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new HttpRequestException(sprintf('An exception was thrown during the API request to %s: %s',
              $request->getUrl(), $e->getMessage()), 0, $e);
        }

        $responseData = json_decode($json);
        if (json_last_error()) {
            throw new HttpRequestException(sprintf('The request to %s did not return valid JSON.',
              $request->getUrl()));
        } elseif (is_array($responseData) && isset($responseData['error'])) {
            throw new ErrorResponseException($responseData['error'],
              $responseData['code']);
        } else {
            return $json;
        }
    }

    /**
     * Gets the API's base URL.
     *
     * @return string
     *   An absolute URL.
     */
    abstract protected function getBaseUrl();

    /**
     * Returns a \GuzzleHttp\Query aggregator callable.
     *
     * @return callable
     */
    public static function getGuzzleQueryAggregator()
    {
        return function (array $data) {
            $aggregated_data = [];
            foreach ($data as $key => $values) {
                $aggregated_data[$key] = is_array($values) ? [
                  implode(',', $values)
                ] : [$values];
            }

            return $aggregated_data;
        };
    }

    /**
     * Add compression to the request.
     *
     * @param RequestInterface $request
     */
    protected function addCompression(RequestInterface $request)
    {
        $request->setHeader('Accept-Encoding', 'gzip');
    }

}
