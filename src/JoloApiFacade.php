<?php
/**
 * *
 *  *  * Copyright (C)Optimo Technologies- All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\JoloApi;


use Illuminate\Support\Facades\Facade;

/**
 * @method static self checkBalance()
 * @method static self agentSignUp()
 * @method static self verifyAgent()
 * @see JoloApi
 */
class JoloApiFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jolo-api';
    }
}