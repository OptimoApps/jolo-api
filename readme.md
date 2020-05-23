---
#### Laravel 5 Package for Jolo Api(unofficial)
![run-tests](https://github.com/OptimoApps/jolo-api/workflows/run-tests/badge.svg)
![Check & fix styling](https://github.com/OptimoApps/jolo-api/workflows/Check%20&%20fix%20styling/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/OptimoApps/laravel-joloapi/blob/master/LICENSE.md)
[![Latest Stable Version](https://poser.pugx.org/optimoapps/jolo-api/version)](https://packagist.org/packages/optimoapps/jolo-api)
[![Total Downloads](https://poser.pugx.org/optimoapps/jolo-api/downloads)](https://packagist.org/packages/optimoapps/jolo-api)
<p align="center">
  <img width="500" height="300" src="https://www.optimoapps.com/images/laravel_jolo_api.png">
</p>

---

## Installation

This package can be installed through Composer.

    composer require optimoapps/jolo-api
    
In Laravel 5.5 and above the package will autoregister the service provider.

Publish the config file of this package with this command:

    php artisan vendor:publish --provider="OptimoApps\JoloApi\JoloApiServiceProvider"
    
The following config file will be published in config/jolo-api.php

    return [
        'key' => '',   //Provide your api key
        'mode' => 0   //Change 1 for live
    ];
    
## Usage
    use JoloApi;
    JoloApi::checkBalance()->toArray();
    

Convert to Array 
    
    JoloApi::checkBalance()->toArray();
    
Or if Json Result just call toJson()

    JoloApi::checkBalance()->toJson();
    
###### Available Class Methods

Agent Signup
    
    use JoloApi;
    $params =  [
        'service'=> 12342233444,   //Mobile no
        'name'=> 'name',  //name of an agent
        'address'=> 'XXXXXX',  //Address of an agent
        'email'=> 'info@optimoapps.com'  //email id of an corporate agent  
    ];
    $result = JoloApi::agentSignUp($params)->toArray();
    
For Transfer Money
    
    use JoloApi;
    $params =  [
        'service'=> 12342233444,   //Mobile no
        'beneficiaryid'=> 'name',  //unique beneficiary id
        'orderid'=> 'XXXXXX',  //unique order generated by your script
        'amount'=> 300,
        'remarks' => 'any text' 
    ];
    $result = JoloApi::transferMoney($params)->toArray()    
    
For more details ,Please check [JoloSoft doc](https://jolosoft.com/docs.php) 
        
    
## Testing
Run the tests with:

    vendor/bin/phpunit
        
## Security
If you discover any security related issues, please email info@optimoapps.com instead of using the issue tracker.     

## License
The MIT License (MIT). Please see [License File](https://github.com/OptimoApps/laravel-joloapi/blob/master/LICENSE.md) for more information.       
