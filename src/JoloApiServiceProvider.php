<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com> ManiKandan <smanikandanit@gmail.com>.
 */

namespace OptimoApps\JoloApi;

use Illuminate\Support\ServiceProvider;
use OptimoApps\JoloApi\Exceptions\InvalidConfiguration;

/**
 * Class JoloApiServiceProvider.
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
        $configPath = __DIR__.'/../config/jolo-api.php';
        $this->publishes([
            $configPath => config_path('courier.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JoloApi::class, function () {
            $config = config('jolo-api');
            $this->checkInvalidConfiguration($config);

            return JoloApiFactory::createForConfig($config);
        });
        $this->app->alias(JoloApi::class, 'jolo-api');
    }

    /**
     * @throws InvalidConfiguration
     */
    protected function checkInvalidConfiguration(array $config = null)
    {
        if (empty($config['key'])) {
            throw InvalidConfiguration::keyNotSpecified();
        }
    }
}
