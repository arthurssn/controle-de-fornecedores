<?php

namespace App\Repositories;

use App\Interfaces\BrasilAPI\IBrasilAPIRepository;
use GuzzleHttp\Client;

class BrasilAPIRepository implements IBrasilAPIRepository
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
