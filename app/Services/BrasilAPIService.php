<?php

namespace App\Services;

use App\Interfaces\BrasilAPI\IBrasilAPIService;
use GuzzleHttp\Client;

class BrasilAPIService implements IBrasilAPIService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://brasilapi.com.br/api/',
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getCompanyInfo(string $cnpj)
    {
        $response = $this->client->request('GET', "cnpj/v1/{$cnpj}");

        return collect(json_decode($response->getBody()->getContents(), true));
    }
}
