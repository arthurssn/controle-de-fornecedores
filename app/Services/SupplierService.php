<?php

namespace App\Services;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Interfaces\Supplier\ISupplierService;

class SupplierService implements ISupplierService
{
    public function __construct(private readonly ISupplierRepository $repository)
    {
    }

    public function getAll(array $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function getById(int $id): object
    {
        return new \stdClass();
    }

    public function create(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
