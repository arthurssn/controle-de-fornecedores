<?php

namespace App\Services;

use App\Interfaces\ICRUD;

class CRUDService implements ICRUD
{
    public function __construct(private readonly ICRUD $repository)
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
        return $this->repository->create($data);
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
