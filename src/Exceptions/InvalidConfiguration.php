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

namespace Optimo\JoloApi\Exceptions;
use Exception;

/**
 * Class InvalidConfiguration
 * @package Optimo\JoloApi\Exceptions
 */
class InvalidConfiguration extends Exception
{
    /**
     * @return InvalidConfiguration
     */
    public static function keyNotSpecified()
    {
        return new static('There was no key specified in config file');
    }

    /**
     * @return InvalidConfiguration
     */
    public static function userIdNotSpecified()
    {
        return new static('There was no userid specified in config file');
    }

}