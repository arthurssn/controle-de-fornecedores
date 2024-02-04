<?php

namespace App\Interfaces\BrasilAPI;

interface IBrasilAPI
{
    public function getCompanyInfo(string $cnpj);
}
