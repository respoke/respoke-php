# Respoke PHP Library

The Respoke PHP Library is a wrapper for the Respoke REST API. For more information on the
Respoke service and API see [docs.respoke.io](http://docs.respoke.io).

## Installation

Install Respoke's PHP Library to your project using [Composer](https://getcomposer.org/).

    composer require respoke/respoke
    
After installing, you need to require Composer's autoloader:

    require 'vendor/autoload.php';
    
## Running the library

Install the library's dependencies.

    composer install
    
Then use the library. Sign up for a FREE [Respoke account](https://portal.respoke.io/#/signup).

    use Respoke\Client;
   
    $client = new Respoke\Client([
        "appId" => "APP_ID",
        "appSecret" => "APP_SECRET",
        "roleId" => "ROLE_ID",
        "endpointId" => "USER_NAME"
    ]);
    
    $tokenId = $client->getTokenId();
    
Return this `$tokenId` to your front-end and pass it to the `token` property when connecting to Respoke.

## Running the tests

The test suite uses PHPUnit for test coverage. Run with either the --testdox argument for more descriptive tests.

    phpunit --testdox ClientTest
    phpunit ClientTest

## Contributing

If you wish to submit an issue use the [issue tracker].

[issue tracker]: https://github.com/respoke/respoke-php/issues

1. Fork it ( https://github.com/[my-github-username]/respoke-php/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -a -m 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request

## License

This source code is licensed under The MIT License.