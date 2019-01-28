---
#### Laravel 5 Package for Jolo Api(unofficial)
[![Build Status](https://travis-ci.org/OptimoApps/laravel-joloapi.svg?branch=master)](https://travis-ci.org/OptimoApps/laravel-joloapi)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/OptimoApps/laravel-joloapi/blob/master/LICENSE.md)

<p align="center">
  <img width="500" height="300" src="https://www.optimoapps.com/images/laravel_jolo_api.png">
</p>

---

## Installation

This package can be installed through Composer.

    composer require optimoapps/jolo-api
    
In Laravel 5.5 and above the package will autoregister the service provider.

Publish the config file of this package with this command:

    php artisan vendor:publish --provider="OptimoApps/JoloApi/JoloApiServiceProvider"
    
The following config file will be published in config/jolo-api.php

    return [
        'key' => '',   //Provide your api key
        'userid' => '',
        'mode' => 0   //Change 1 for live
    ];
    
## Usage
    use Optimo/JoloApi
## Testing
Run the tests with:

    vendor/bin/phpunit
        
## Security
If you discover any security related issues, please email info@optimoapps.com instead of using the issue tracker.     

## License
The MIT License (MIT). Please see [License File](https://github.com/OptimoApps/laravel-joloapi/blob/master/LICENSE.md) for more information.       