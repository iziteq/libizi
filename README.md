# About
[![Build Status](https://travis-ci.org/Triquanta/libizi.svg?branch=master)](https://travis-ci.org/Triquanta/libizi)

This is a PHP library for communicating with the 
[izi.TRAVEL API](http://api-docs.izi.travel/).

## Requirements
All requirements are resolved through [Composer](http://getcomposer.org). After
installing composer, go to the project root and run `composer install` to
install all dependencies.

## Usage & features

### Client
The library provides a client to communicate with the API. It handles all
requests, errors, and converts all API output to classes PHP objects.
Three preparatory steps must be taken before API calls can be made:

1. Create a `\GuzzleHttp\Client` instance.
2. Create a `\Triquanta\IziTravel\Client\*RequestHandler` instance and inject
   the Guzzle client from step 1 and an API key.
3. Create a [`Triquanta\IziTravel\Client\Client`](./src/Client/Client.php) 
   instance and inject the request
   handler from step 2.

Now you can call any of the methods on the client from step 3 and get the API's
output as (arrays of) classed PHP objects.

### Data types
Because working with raw, untyped data in PHP is bad developer experience (DX),
every data type in the API has corresponding interfaces and classes in this
library. All classes come with factory methods
([`\Triquanta\IziTravel\DataType\FactoryInterface`](./src/DataType/FactoryInterface.php)) 
to instantiate an object based on the API's raw JSON response.

### Events
[Symfony EventDispatcher](http://symfony.com/doc/current/components/event_dispatcher/introduction.html)
is used for dispatching system events. Event names and classes are documented in 
[`\Triquanta\IziTravel\Event\IziTravelEvents`](./src/Event/IziTravelEvents.php).

## Development

### Versioning
All development takes places on the `master` branch. Versions are released based 
on [Semantic Versioning](http://semver.org).

### Supporting a new API endpoint
Each API endpoint is represented by a request class in 
[`\Triquanta\IziTravel\Request`](./src/Request) and it must implement 
[`\Triquanta\IziTravel\Request\RequestInterface`](./src/Request/RequestInterface.php). 
It can optionally implement any of the other 
[interfaces](http://php.net/manual/en/language.oop5.interfaces.php) in the same 
namespace and use any of the 
[traits](http://php.net/manual/en/language.oop5.traits.php) to quickly build a 
configurable request. Any object data returned by an endpoint must be converted 
to classed objects before being returned by 
`\Triquanta\IziTravel\Request\RequestInterface::execute()` implementations. 
The existing data types in [`Triquanta\IziTravel\DataType`](./src/DataType) can 
be re-used.
[`\Triquanta\IziTravel\ClientInterface`](./src/Client/ClientInterface.php) is a 
convenience layer for easily requesting data from different endpoints in the 
same code. When adding a new request class, a method for it must be added to 
this interface as well.

#### Example
A new endpoint `foo` was added for retrieving _Foo_ content by UUID. 
Additionally the content can be returned in a specific language and format 
(full/compact). The first step is to create a class that implements the correct 
interface (which is inherited from 
[`RequestBase`](./src/Request/RequestBase.php)):

```php
<?php
    
/**
 * @file Contains \Triquanta\IziTravel\Request\FooByUuid.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Returns a Foo object by UUID.
 */
class FooByUuid extends RequestBase {

    /**
     * @return \Triquanta\IziTravel\DataType\FooInterface
     */
    public function execute() {
    }

}
```

Now we have the basis for any request. Because this endpoint supports forms and 
is multilingual, we can easily add support for this by implementing two 
interfaces and using two traits:

```php
<?php

class FooByUuid extends RequestBase implements FormInterface, MultilingualInterface, UuidInterface {

    use FormTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\FooInterface
     */
    public function execute() {
    }

}
```

The class will now feature additional methods and properties for setting and 
storing the form, language, and UUID of the content that should be returned by 
the API.

Now we are able to configure instances of this class, we need to use this 
configuration to execute the actual request and get the JSON from the response:

```php
<?php

public function execute() {
    $json = $this->requestHandler->request('/foo', [
      'form' => $this->form,
      'languages' => $this->languageCodes,
      'uuid' => $this->limit,
    ]);
}
```

The request is made to the endpoint, and we pass along the values of the three 
endpoint parameters (form, language, UUID). As you can see, we use the traits' 
properties for this.

What remains is the conversion of this JSON to a classed object. We don't have 
to worry about NULL values, because the API returns HTTP error response in case 
the requested content is not available. That means by the time this code is 
executed, we can be sure the response is positive.

```php
<?php

public function execute() {
    // ...
    
    return Foo::createFromJson($json, $this->form);
}
```

All data object classes implement 
[`FactoryInterface`](./src/DataType/FactoryInterface.php) and must be 
instantiated by using the interface's methods. By calling `::createFromJson()`, 
we also validate the JSON against the available schemas.

The request class in its entirety now looks like this:

```php
<?php
    
/**
 * @file Contains \Triquanta\IziTravel\Request\FooByUuid.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Returns a Foo object by UUID.
 */
class FooByUuid extends RequestBase implements FormInterface, MultilingualInterface, UuidInterface {

    use FormTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\FooInterface
     */
    public function execute() {
        $json = $this->requestHandler->request('/foo', [
          'form' => $this->form,
          'languages' => $this->languageCodes,
          'uuid' => $this->limit,
        ]);

        return Foo::createFromJson($json, $this->form);
    }

}
```

For convenience we also add a factory method to 
[`ClientInterface`](./src/Client/ClientInterface.php). Because the language and 
UUID are the only required request parameters, they are also the only parameters 
to the factory method. Any remaining optional parameters can be configured using 
the setters on the returned request object.

```php
<?php

namespace Triquanta\IziTravel\Client;

interface ClientInterface
{

    // ...

    /**
     * Gets a request to get a Foo object by its UUID.
     *
     * @param string[] $languageCodes
     *   An array of ISO 639-1 alpha-2 language codes.
     * @param string $uuid
     *
     * @return \Triquanta\IziTravel\Request\FooByUuid
     */
    public function getFooByUuid(array $languageCodes, $uuid);

}
```

The method's implementation in [`Client`](./src/Client/Client.php) would look 
like this:

```php
<?php

namespace Triquanta\IziTravel\Client;

use namespace Triquanta\IziTravel\Request\FooByUuid;

class Client implements ClientInterface
{

    // ...

    public function getFooByUuid(array $languageCodes, $uuid)
    {
        return FooByUuid::create($this->requestHandler)
          ->setLanguageCodes($languageCodes)
          ->setUuid($uuid);
    }

}
```

The newly supported endpoint can then be used:

```php
<?php

use Triquanta\IziTravel\Client\Client;

$client = new Client(/* ... */);
/** @var \Triquanta\IziTravel\DataType\FooInterface $foo */
$foo = $client->getFooByUuid(['en'], 'de305d54-75b4-431b-adb2-eb6b9e546014')->setForm(FormInterface::FORM_COMPACT)->execute();

```


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
