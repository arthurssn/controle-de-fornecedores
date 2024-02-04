<?php

namespace App\Repositories;

use App\Interfaces\ICRUD;
use Illuminate\Database\Eloquent\Model;

class CRUDRepository implements ICRUD
{
    public function __construct(private readonly Model $model)
    {
    }

    public function getAll(array $filter = null)
    {
        return $this->model->all();
    }

    public function getById(int $id): object
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        $item = $this->model->find($id);
        if (!$item) {
            throw new \Exception('Item not found', 404);
        }

        return $item->update($data);
    }

    public function delete(int $id)
    {
        $item = $this->model->find($id);
        if (!$item) {
            throw new \Exception('Item not found', 404);
        }

        return $item->delete();
    }
}
