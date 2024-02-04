<?php

namespace App\Repositories;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Models\Supplier;

class SupplierRepository implements ISupplierRepository
{

    public function getAll(array $filter = null)
    {
        return Supplier::all();
    }

    public function getById(int $id): object
    {
        return Supplier::find($id);
    }

    public function create(array $data)
    {
        return Supplier::create($data);
    }

    public function update(array $data, int $id)
    {
        return Supplier::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Supplier::find($id)->delete();
    }
}
