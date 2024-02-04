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
        return $this->repository->getCompanyInfo($cnpj);
    }
}
