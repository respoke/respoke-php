# Respoke PHP Library

The respoke-php library is a wrapper for the Respoke REST API. For more information on the
Respoke service and API see [docs.respoke.io](http://docs.respoke.io).

## Installation

Install Respoke's PHP library to your project using composer.

    composer require respoke
    
## Running the library

Install the library's dependencies.

    composer install
    
Then use the library.
   
    $client = new Respoke\Client([
        "appId" => "APP_ID",
        "appSecret" => "APP_SECRET",
        "roleId" => "ROLE_ID",
        "endpointId" => "USER_NAME"
    ]);

## Running the tests

The test suite uses PHPUnit for test coverage. Run with either the --testdox argument for more descriptive tests.

    phpunit --testdox ClientTest
    phpunit ClientTest

## Contributing

If you wish to submit an issue use the [issue tracker].

[issue tracker]: https://github.com/tiandavis/respoke-php/issues

1. Fork it ( https://github.com/[my-github-username]/respoke-php/fork )
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -a -m 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create a new Pull Request

## License

This source code is licensed under The MIT License.