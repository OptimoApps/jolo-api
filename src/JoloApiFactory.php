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

namespace OptimoApps\JoloApi;

use GuzzleHttp\Client;

/**
 * Class JoloApiFactory
 * @package Optimo\JoloApi
 */
class JoloApiFactory
{
    /**
     * @param array $config
     * @return JoloApi
     */
    public static function createForConfig(array $config): JoloApi
    {
        return (new JoloApi(new Client()))
            ->setKey($config['key'])
            ->setMode(empty($config['mode'])?0:1)
            ->setType('json')
            ->setService($config['service'])
            ->setUserId($config['userid']);
    }
}