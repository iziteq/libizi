# About
[![Build Status](https://travis-ci.org/Triquanta/libizi.svg?branch=master)](https://travis-ci.org/Triquanta/libizi)

This is a PHP library for communicating with the izi.TRAVEL API.

## Features

### Data types
Because working with raw, untyped data in PHP is bad developer experience (DX),
every data type in the API has corresponding interfaces and classes in this
library. All classes come with factory methods
([`\Triquanta\IziTravel\DataType\FactoryInterface`](./src/DataType/FactoryInterface.php)) 
to instantiate an object based on the API's raw JSON response.

### Clients
The library provides clients to communicate with the API. They handle all
requests, errors, and convert all API output to PHP objects.

## Requirements
All requirements are resolved through [Composer](http://getcomposer.org). After
installing composer, go to the project root and run `composer install` to
install all dependencies.

## Usage
Three preparatory steps must be taken before API calls can be made:

1. Create a `\GuzzleHttp\Client` instance.
2. Create a `\Triquanta\IziTravel\Client\*RequestHandler` instance and inject
   the Guzzle client from step 1 and an API key.
3. Create a [`Triquanta\IziTravel\Client\Client`](./src/Client/Client.php) 
   instance and inject the request
   handler from step 2.

Now you can call any of the methods on the client from step 3 and get the API's
output as classed PHP objects.

## Development

### Supporting a new API endpoint
Each API endpoint is represented by a request class in 
[`\Triquanta\IziTravel\Request`](./src/Request) and it must implement 
[`\Triquanta\IziTravel\Request\RequestInterface`](./src/Request/RequestInterface.php). 
It can optionally implement any of the other interfaces in the same namespace 
and use any of the traits to quickly build a configurable request.
Any object data returned by an endpoint must be converted to classed objects 
before being returned by 
`\Triquanta\IziTravel\Request\RequestInterface::execute()` implementations. 
The existing data types in [`Triquanta\IziTravel\DataType`](./src/DataType) can 
be re-used.
[`\Triquanta\IziTravel\ClientInterface`](./src/Client/ClientInterface.php) is a 
convenience layer for easily requesting data from different endpoints in the 
same code. When adding a new request class, a method for it must be added to 
this interface as well. 

### PSR-2
All code must be written according the 
[PSR-2](http://www.php-fig.org/psr/psr-2/) guidelines.

### PSR-4
Class and interface autoloading is done using
[PSR-4](http://www.php-fig.org/psr/psr-4/) using the following namespace
mappings:

* `\Triquanta\IziTravel` maps to [./src](./src)
* `\Triquanta\IziTravel\Tests` maps to [./tests](./tests)

### Testing
The library comes with [PHPUnit](https://phpunit.de/)-based tests that can be
run using [./phpunit.xml.dist](./phpunit.xml.dist). All tests are located in
[`\Triquanta\IziTravel\Tests`](./tests).

Some tests require configuration. Copy 
[./test_configuration.example.yml](./test_configuration.example.yml) to
`./test_configuration.local.yml` and fill out the values.
