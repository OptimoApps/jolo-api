---
![Laravel5 Jolo Api](https://www.optimoapps.com/images/laravel_jolo_api.png)
#### Laravel 5 Package for Jolo Api(unofficial)

---

## Installation

This package can be installed through Composer.

    composer require OptimoApps/laravel-joloapi
    
In Laravel 5.5 and above the package will autoregister the service provider.

Publish the config file of this package with this command:

    php artisan vendor:publish --provider="OptimoApps/laravel-joloapi\JoloApiServiceProvider"
    
The following config file will be published in config/jolo-api.php

    return [
        'key' => '',   //Provide your api key
        'userid' => '',
        'mode' => 0   //Change 1 for live
    ];
    
## Usage
    use Optimo/JoloApi
    
## Security
If you discover any security related issues, please email info@optimoapps.com instead of using the issue tracker.     

## License
The MIT License (MIT). Please see [License File](https://github.com/OptimoApps/laravel-joloapi/blob/master/LICENSE.md) for more information.       