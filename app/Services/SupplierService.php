<?php

namespace App\Services;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Interfaces\Supplier\ISupplierService;

class SupplierService implements ISupplierService
{
    public function __construct(private readonly ISupplierRepository $repository)
    {
    }

    public function getAll(array $filter = null)
    {
        return $this->repository->getAll($filter);
    }

    public function getById(int $id): object
    {
        return $this->repository->getById($id);
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
        return $this->repository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
