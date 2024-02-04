<?php

namespace App\Services;

use App\Interfaces\BrasilAPI\IBrasilAPIService;
use App\Interfaces\Supplier\ISupplierRepository;
use App\Interfaces\Supplier\ISupplierService;

class SupplierService extends CRUDService implements ISupplierService
{
    public function __construct(
        private readonly ISupplierRepository $repository,
        private readonly IBrasilAPIService   $brasilAPIService
    )
    {
        parent::__construct($repository);
    }

    public function getAll($filter = null)
    {
        if (isset($filter['cnpj'])) {
            return $this->brasilAPIService->getCompanyInfo($filter['cnpj']);
        }

        return $this->repository->getAll($filter);
    }

    public function create(array $data)
    {
        if (!isset($data['cpf_cnpj']) || $this->repository->cpfOrCnpjAlreadyInUse($data['cpf_cnpj'])) {
            throw new \Exception('CPF/CNPJ invalid or already in use');
        }

        if (isset($data['email']) && $this->repository->emailAlreadyInUse($data['email'])) {
            throw new \Exception('Email already in use');
        }

        if (isset($data['phone']) && $this->repository->phoneAlreadyInUse($data['phone'])) {
            throw new \Exception('Phone already in use');
        }

        return $this->repository->create($data);
    }
}
