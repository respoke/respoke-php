# Respoke PHP Library [![Build Status](https://travis-ci.org/respoke/respoke-php.svg?branch=master)](https://travis-ci.org/respoke/respoke-php)


Respoke PHP is the officially supported PHP library for [Respoke](https://respoke.io).

With Respoke, you can add live voice, video, text and data features to your
website or mobile app. Check out our
[Guides](https://docs.respoke.io/server/php/getting-started.html) to get started
using Respoke and Respoke PHP now.

Please validate you have PHP 5.4.\* or greater installed.

## Installation

Install [Respoke's PHP Library](https://packagist.org/packages/respoke/respoke)
to your project using [Composer](https://getcomposer.org/).

    composer require respoke/respoke

## Running the library

Install the library's dependencies.

    composer install

After installing, you need to require Composer's autoloader:

    require 'vendor/autoload.php';

Then use the library. Request access to Respoke at the
[Respoke website](https://portal.respoke.io/#/signup).

    use Respoke\Client;

    $client = new Respoke\Client([
        "appId" => "APP_ID",
        "appSecret" => "APP_SECRET",
        "roleId" => "ROLE_ID",
        "endpointId" => "USER_NAME"
    ]);

    $tokenId = $client->getTokenId();

Return this `$tokenId` to your front-end and pass it to the `token` property
when connecting to Respoke.

    json_encode(["token" => $tokenId]);

## Running the tests

The test suite uses PHPUnit for test coverage.

    phpunit --configuration phpunit.xml.dist

## Contributing

If you wish to submit an issue use the [issue tracker].

[issue tracker]: https://github.com/respoke/respoke-php/issues

1. Fork it ( https://github.com/[my-github-username]/respoke-php/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -a -m 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request

## Cutting a new release

[PHPRelease](https://github.com/c9s/PHPRelease) is used to release a new version
of this package. Details of the use of PHPRelease can be found on the project's
readme.

This project follows [semantic versioning](http://semver.org/). The tl;dr of
semver is:

* new **major** version when there are breaking changes to the public api of the
  library.
* new **minor** version when there are backward-compatible changes to the api,
  such as new features.
* new **patch** version when there are backward-compatible bug fixes, or other
  changes that do not affect the public API.

## License

This source code is licensed under The MIT License.
