<?php

namespace App\Services;

use App\Interfaces\BrasilAPI\IBrasilAPIRepository;
use App\Interfaces\BrasilAPI\IBrasilAPIService;

class BrasilAPIService implements IBrasilAPIService
{
    public function __construct(
        private readonly IBrasilAPIRepository $repository
    )
    {
    }

    public function getCompanyInfo(string $cnpj)
    {
        try {
            return $this->repository->getCompanyInfo($cnpj);
        } catch (\Exception $e) {
            throw new \Exception('Erro ao buscar fornecedor. ' . ($e->getCode() == 404 ? 'CNPJ Não encontrado' : ''), $e->getCode());
        }
    }
}
