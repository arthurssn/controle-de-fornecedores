<?php

namespace App\Interfaces\BrasilAPI;

interface IBrasilAPIService
{
    public function getCompanyInfo(string $cnpj);
}
