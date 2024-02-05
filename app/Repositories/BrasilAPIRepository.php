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
            'timeout' => 2.0,
        ]);
    }

    public function getCompanyInfo(string $cnpj)
    {
        try {
            $response = $this->client->request('GET', "cnpj/v1/{$cnpj}");
            return collect(json_decode($response->getBody()->getContents(), true));
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar fornecedor. ' . ($e->getCode() == 404 ? 'CNPJ Não encontrado' : ''), $e->getCode());
        }
    }
}
