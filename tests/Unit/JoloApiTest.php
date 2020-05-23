<?php
/**
 * *
 *  *  * Copyright (C) Optimo Technologies - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\JoloApi\Test\Unit;

use Mockery;
use OptimoApps\JoloApi\JoloApi;
use PHPUnit\Framework\TestCase;

/**
 * Class JoloApiTest.
 */
class JoloApiTest extends TestCase
{
    /**
     * @var
     */
    protected $joloApi;

    public function setUp(): void
    {
        $this->joloApi = Mockery::mock(JoloApi::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * @test
     */
    public function it_can_fetch_balance_json()
    {
        $this->joloApi->shouldReceive('checkBalance->toJson')
            ->once()
            ->andReturn(json_encode(
                ['status'   => 'SUCCESS',
                    'error' => 0, 'balance' => 10,
                    'time'  => 'March 02 2018 05:50:12 PM',
                ]));
        $response = $this->joloApi->checkBalance()->toJson();
        $this->assertTrue(is_string($response));
        $this->assertJson($response);
        $this->assertEquals('SUCCESS', (json_decode($response))->status);
    }

    /**
     * @test
     */
    public function it_can_fetch_balance_array()
    {
        $this->joloApi->shouldReceive('checkBalance->toArray')
            ->once()
            ->andReturn(
                ['status'   => 'SUCCESS',
                    'error' => 0, 'balance' => 10,
                    'time'  => 'March 02 2018 05:50:12 PM',
                ]);
        $response = $this->joloApi->checkBalance()->toArray();
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('time', $response);
    }

    /**
     * @test
     */
    public function verify_transfer_money_array()
    {
        $this->joloApi->shouldReceive('transferMoney->toArray')
            ->once()
            ->andReturn(
                ['status'           => 'SUCCESS',
                    'service'       => 9999999999,
                    'beneficiaryid' => '50200022054385_HDFC0000563',
                    'orderid'       => '11111111',
                    'txid'          => 'C201810151399850111',
                    'amount'        => 100,
                    'charged'       => 106,
                    'bankid'        => '81241816536',
                    'desc'          => 'Transfer completed successfully',
                    'error'         => '', 'balance' => 10,
                    'time'          => 'March 02 2018 05:50:12 PM',
                ]);
        $params = [
            'service'       => 9999999999,
            'beneficiaryid' => '50200022054385_HDFC0000563',
            'orderid'       => 11111111,
            'amount'        => 100,
            'remarks'       => 'test',
        ];
        $response = $this->joloApi->transferMoney($params)->toArray();
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('time', $response);
    }
}
