<?php

use GuzzleHttp\Client;
use Triquanta\IziTravel\Client\DevelopmentRequestHandler;
use Triquanta\IziTravel\Client\MtgObjectClient;

require_once 'vendor/autoload.php';

$httpClient = new Client();
$apiKey = '7d222ac3-4487-46e5-b727-f8c86ffefe42';
$requestHandler = new DevelopmentRequestHandler($httpClient, $apiKey);
$mtgObjectClient = new MtgObjectClient($requestHandler);

$uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';

$mtgObject = $mtgObjectClient->getMtgObjectsChildrenByUuid($uuid, ['en']);
print_r($mtgObject);
