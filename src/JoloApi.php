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

namespace Optimo\JoloApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException as HttpBadResponseException;
use GuzzleHttp\Exception\ClientException as HttpClientException;
use GuzzleHttp\Exception\ServerException as HttpServerException;
use Illuminate\Support\Fluent;
use Optimo\JoloApi\Enum\JoloApiEnum;
use Psr\Http\Message\StreamInterface;

/**
 * Class JoloApi
 * @package Optimo\JoloApi
 */
class JoloApi
{

    /**
     * @var integer
     */
    protected $mode;
    /**
     * @var string
     */
    protected $userId;
    /**
     * @var string
     */
    protected $key;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var integer
     */
    protected $service;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $response;


    /**
     * JoloApi constructor.
     * @param Client $client
     *
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $key
     * return $this
     */
    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param int $mode
     * return $this
     */
    public function setMode(int $mode): self
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @param int $service
     * return $this
     */
    public function setService(int $service): self
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param string $userId
     * return $this
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param string $type
     * return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /*
     * Retrieve Balance details
     * https://joloapi.com/money_transfer_docs_w2b_corporate.php#api_balance
     * @return JoloApi
     */
    public function checkBalance(): self
    {
        try {
            $queryParams = $this->buildQueryString();
            $response = $this->makeHttpRequest(JoloApiEnum::BALANCE_CHECK, $queryParams)->getContents();
            $this->response = json_decode($response);
            return $this;
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Pass params for agent sign up
     * https://joloapi.com/money_transfer_docs_w2b_corporate.php#api_agentsignup
     * @param array $params
     * ['service'] int Mobile number of agent
     * ['name'] Full name of agent
     * ['address'] Address of agent
     * ['email'] Email id of agent
     * @return JoloApi
     */
    public function agentSignUp(array $params):self {
        try {
            $queryParams =array_merge($params,$this->buildQueryString());
            $response = $this->makeHttpRequest(JoloApiEnum::BALANCE_CHECK, $queryParams)->getContents();
            $this->response = json_decode($response);
            return $this;
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Pass params for agent verify
     * https://joloapi.com/money_transfer_docs_w2b_corporate.php#api_agentverify
     * @param array $params
     * ['service'] int Mobile number of agent
     * ['otp']otp received on mobile (4 digit)
     * @return $this
     */
    public function verifyAgent(array  $params){
        try {
            $queryParams =array_merge($params,$this->buildQueryString());
            $response = $this->makeHttpRequest(JoloApiEnum::BALANCE_CHECK, $queryParams)->getContents();
            $this->response = json_decode($response);
            return $this;
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * Convert to php Array
     * @return array
     */
    public function toArray(): array
    {
        $fluent = new Fluent($this->response);
        return $fluent->toArray();
    }

    /**
     * Convert to Json String format
     * @return string
     */
    public function toJson(): string
    {
        $fluent = new Fluent($this->response);
        return $fluent->toJson();
    }

    /**
     * Method to build query string.
     * @return array
     */
    private function buildQueryString(): array
    {
        return [
            'userid' => $this->userId,
            'key' => $this->key,
            'type' => $this->type
        ];
    }

    /**
     * Perform Jolo API request & return response.
     *
     * @throws \Exception
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    private function makeHttpRequest(string $api, array $queryParams): StreamInterface
    {
        try {
            return $this->client->get($api, [
                'query' => $queryParams
            ])->getBody();
        } catch (HttpClientException $e) {
            throw new \Exception($e->getRequest() . ' ' . $e->getResponse());
        } catch (HttpServerException $e) {
            throw new \Exception($e->getRequest() . ' ' . $e->getResponse());
        } catch (HttpBadResponseException $e) {
            throw new \Exception($e->getRequest() . ' ' . $e->getResponse());
        }
    }

}