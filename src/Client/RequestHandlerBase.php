<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\RequestHandler.
 */

namespace Triquanta\IziTravel\Client;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Triquanta\IziTravel\Event\PostResponse;
use Triquanta\IziTravel\Event\PreRequest;
use Triquanta\IziTravel\Event\IziTravelEvents;

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
    public function __construct(EventDispatcherInterface $eventDispatcher, HttpClientInterface $httpClient, $apiKey, $password = null)
    {
        $this->apiKey = $apiKey;
        $this->eventDispatcher = $eventDispatcher;
        $this->httpClient = $httpClient;
        $this->password = $password;
    }

    public function request($urlPath, array $parameters = [])
    {
        $request = $this->httpClient->createRequest('GET');
        $url = rtrim($this->getBaseUrl(), '/') . '/' . trim($urlPath, '/');
        $request->setUrl($url);
        // Set the API key in a header instead of a URL parameter, so it will
        // not accidentally end up in log messages.
        $request->setHeader('X-IZI-API-KEY', $this->apiKey);
        if ($this->password) {
            $parameters['password'] = $this->password;
        }
        $request->getQuery()->replace($parameters);
        $request->getQuery()->setAggregator(static::getGuzzleQueryAggregator());
        $pre_request_event = new PreRequest($request);
        $this->eventDispatcher->dispatch(IziTravelEvents::PRE_REQUEST, $pre_request_event);
        try {
            $response = $this->httpClient->send($request);
            $post_response_event = new PostResponse($response);
            $this->eventDispatcher->dispatch(IziTravelEvents::POST_RESPONSE, $post_response_event);
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
                $aggregated_data[$key] = is_array($values) ? [implode(',', $values)] : [$values];
            }

            return $aggregated_data;
        };
    }

}
