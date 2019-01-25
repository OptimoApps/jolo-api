<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */
namespace Optimo\JoloApi\Test\Integration;

use Optimo\JoloApi\Exceptions\InvalidConfiguration;
use Optimo\JoloApi\JoloApiFacade;


class JoloApiServiceProviderTest extends  TestCase
{
    /** @test */
    public function throw_exception_key_not_set(){
        $this->app['config']->set('jolo-api.key', '');
        $this->expectException(InvalidConfiguration::class);
        JoloApiFacade::checkBalance();
    }

    /** @test */
    public function throw_exception_userid_not_set(){
        $this->app['config']->set('jolo-api.key', 'key');
        $this->app['config']->set('jolo-api.userid','');
        $this->expectException(InvalidConfiguration::class);
        JoloApiFacade::checkBalance();
    }
}