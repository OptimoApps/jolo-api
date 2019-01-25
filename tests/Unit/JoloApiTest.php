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

namespace Optimo\JoloApi\Test\Unit;


use GuzzleHttp\Client;
use Mockery\Mock;
use Optimo\JoloApi\JoloApi;
use PHPUnit\Framework\TestCase;

class JoloApiTest extends TestCase
{
    protected $joloApi;

    public function setUp()
    {

        $this->joloApi =  (new JoloApi(new Client()))->setUserId('spice2mail')
            ->setKey('233900113887425')
            ->setMode(0)
            ->setType('json');
    }

    /**
     * @test
     */
    public function it_can_fetch_balance()
    {
        $response = $this->joloApi->agentSignUp(['sathish'=>'kumar'])->toJson();
        $this->assertJson($response);
    }

}