Google Api Client Wrapper
=========

> Google api php client wrapper with Cloud Platform and Laravel 4 & 5 support

[![Build Status](http://img.shields.io/travis/pulkitjalan/google-apiclient.svg?style=flat-square)](https://travis-ci.org/pulkitjalan/google-apiclient)
[![Scrutinizer Code Quality](http://img.shields.io/scrutinizer/g/pulkitjalan/google-apiclient/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/pulkitjalan/google-apiclient/)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/pulkitjalan/google-apiclient/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/pulkitjalan/google-apiclient/code-structure/master)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](http://www.opensource.org/licenses/MIT)
[![Latest Version](http://img.shields.io/packagist/v/pulkitjalan/google-apiclient.svg?style=flat-square)](https://packagist.org/packages/pulkitjalan/google-apiclient)
[![Total Downloads](https://img.shields.io/packagist/dt/pulkitjalan/google-apiclient.svg?style=flat-square)](https://packagist.org/packages/pulkitjalan/google-apiclient)

## Requirements

This package requires PHP >=5.4

## Installation

Install via composer - edit your `composer.json` to require the package.

```js
"require": {
    "pulkitjalan/google-apiclient": "3.*"
}
```

Then run `composer update` in your terminal to pull it in.

Or use `composer require pulkitjalan/google-apiclient`

## Laravel

To use in laravel add the following to the `providers` array in your `config/app.php`

```php
PulkitJalan\Google\GoogleServiceProvider::class
```

Next add the following to the `aliases` array in your `config/app.php`

```php
'Google' => PulkitJalan\Google\Facades\Google::class
```

Finally run `php artisan vendor:publish --provider="PulkitJalan\Google\GoogleServiceProvider" --tag="config"` to publish the config file.

#### Looking for a Laravel 4 compatible version?

Checkout the [1.0 branch](https://github.com/pulkitjalan/google-apiclient/tree/1.0)

## Usage

The `Client` class takes an array as the first parameter, see example of config file below:

```php
return [
    /*
    |----------------------------------------------------------------------------
    | Google application name
    |----------------------------------------------------------------------------
    */
    'application_name' => '',

    /*
    |----------------------------------------------------------------------------
    | Google OAuth 2.0 access
    |----------------------------------------------------------------------------
    |
    | Keys for OAuth 2.0 access, see the API console at
    | https://developers.google.com/console
    |
    */
    'client_id' => '',
    'client_secret' => '',
    'redirect_uri' => '',
    'scopes' => [],
    'access_type' => 'online',
    'approval_prompt' => 'auto',

    /*
    |----------------------------------------------------------------------------
    | Google developer key
    |----------------------------------------------------------------------------
    |
    | Simple API access key, also from the API console. Ensure you get
    | a Server key, and not a Browser key.
    |
    */
    'developer_key' => '',

    /*
    |----------------------------------------------------------------------------
    | Google service account
    |----------------------------------------------------------------------------
    |
    | Set the credentials JSON's location to use assert credentials, otherwise
    | app engine or compute engine will be used.
    |
    */
    'service' =>  [
        /*
        | Enable service account auth or not.
        */
        'enabled' => false,

        /*
        | Path to service account json file
        */
        'file' => '',
    ],
];

```

To use Google Cloud Platform services, enter the location to the service account JSON file **(not the JSON string itself)**. To use App Engine or Computer Engine, leave it blank.

From [Google's upgrading document](https://github.com/google/google-api-php-client/blob/master/UPGRADING.md):

> Note: P12s are deprecated in favor of service account JSON, which can be generated in the Credentials section of Google Developer Console.


Get `Google_Client`
```php
$client = new PulkitJalan\Google\Client($config);
$googleClient = $client->getClient();
```

Laravel Example:
```php
$googleClient = Google::getClient();
```

Get a service
```php
$client = new PulkitJalan\Google\Client($config);

// returns instance of \Google_Service_Storage
$storage = $client->make('storage');

// list buckets example
$storage->buckets->listBuckets('project id');

// get object example
$storage->objects->get('bucket', 'object');
```
