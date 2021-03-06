<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\JoloApi\Test\Integration;

use JoloApi;
use OptimoApps\JoloApi\Exceptions\InvalidConfiguration;

class JoloApiServiceProviderTest extends TestCase
{
    /** @test */
    public function throw_exception_key_not_set()
    {
        $this->app['config']->set('jolo-api.key', '');
        $this->expectException(InvalidConfiguration::class);
        JoloApi::checkBalance()->toArray();
    }
}
