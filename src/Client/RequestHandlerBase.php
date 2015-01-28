<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Client\RequestHandler.
 */

namespace Triquanta\IziTravel\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Query;

/**
 * Provides an handler for making API requests.
 *
 * Instances of this class are stateless, which means they can be used to make
 * multiple requests.
 */
abstract class RequestHandlerBase implements RequestHandlerInterface {

    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The HTTP client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient;

    /**
     * Constructs a new instance.
     *
     * @param \GuzzleHttp\ClientInterface $httpClient
     * @param string $apiKey
     *   The MTG API key.
     */
    public function __construct(ClientInterface $httpClient, $apiKey) {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    /**
     * Gets the API's base URL.
     *
     * @return string
     *   An absolute URL.
     */
    abstract protected function getBaseUrl();

    public function request($url_path, array $parameters = []) {
        $request = $this->httpClient->createRequest('GET');
        $url = rtrim($this->getBaseUrl(), '/') . '/' . trim($url_path, '/');
        $request->setUrl($url);
        // Set the API key in a header instead of a URL parameter, so it will
        // not accidentally end up in log messages.
        $request->setHeader('X-IZI-API-KEY', $this->apiKey);
        $request->getQuery()->replace($parameters);
        $request->getQuery()->setAggregator(static::getGuzzleQueryAggregator());

        try {
            $response = $this->httpClient->send($request);
            $json = $response->getBody()->getContents();
        }
        catch (\Exception $e) {
            throw new HttpRequestException(sprintf('An exception was thrown during the API request to %s.', $request->getUrl()), 0, $e);
        }

        $response_data = json_decode($json);
        if (json_last_error()) {
            throw new HttpRequestException(sprintf('The request to %s did not return valid JSON.', $request->getUrl()));
        }
        elseif (is_array($response_data) && isset($response_data['error'])) {
            throw new ErrorResponseException($response_data['error'], $response_data['code']);
        }
        else {
            return $json;
        }
    }

    /**
     * Returns a \GuzzleHttp\Query aggregator callable.
     *
     * @return callable
     */
    public static function getGuzzleQueryAggregator() {
        return function (array $data) {
            return Query::walkQuery($data, '', function ($key, $prefix) {
                return is_int($key) ? "{$prefix}[]" : "{$prefix}[{$key}]";
            });
        };
    }

}
