<?php

namespace App\Interfaces\Supplier;

interface ISupplierRepository extends ISupplier
{
    public function cpfOrCnpjAlreadyInUse(string $cpf_cnpj);

    public function emailAlreadyInUse(string $email);

    public function phoneAlreadyInUse(string $phone);

    public function getByCnpj(string $cnpj);
}
