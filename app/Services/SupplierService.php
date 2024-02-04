<?php

namespace App\Services;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Interfaces\Supplier\ISupplierService;

class SupplierService extends CRUDService implements ISupplierService
{
    public function __construct(private readonly ISupplierRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(array $data)
    {
        if ($this->repository->cpfOrCnpjAlreadyInUse($data['cpf_cnpj'])) {
            throw new \Exception('CPF/CNPJ already in use');
        }

        if ($this->repository->emailAlreadyInUse($data['email'])) {
            throw new \Exception('Email already in use');
        }

        if ($this->repository->phoneAlreadyInUse($data['phone'])) {
            throw new \Exception('Phone already in use');
        }

        return $this->repository->create($data);
    }
}
