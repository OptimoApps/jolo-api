<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com> ManiKandan <smanikandanit@gmail.com>
 *  *
 *
 */

namespace OptimoApps\JoloApi;


use Illuminate\Support\ServiceProvider;
use OptimoApps\JoloApi\Exceptions\InvalidConfiguration;

/**
 * Class JoloApiServiceProvider
 * @package Optimo\JoloApi
 */
class JoloApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/jolo-api.php';
        $this->publishes([$configPath => config_path('jolo-api.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JoloApi::class, function () {
            $config = config('jolo-api');
            $this->checkInvalidConfiguration($config);
            return JoloApiFactory::createForConfig($config);
        });
        $this->app->alias(JoloApi::class, 'jolo-api');
    }

    /**
     * @param array|null $config
     * @throws InvalidConfiguration
     */
    protected function checkInvalidConfiguration(array $config = null)
    {
        if (empty($config['key'])) {
            throw InvalidConfiguration::keyNotSpecified();
        }
        if (empty($config['userid'])) {
            throw InvalidConfiguration::userIdNotSpecified();
        }
    }
}