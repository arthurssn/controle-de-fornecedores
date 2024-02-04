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
        $supplier = Supplier::find($id);
        if ($supplier)
            return $supplier->update($data);
        throw new \Exception('Fornecedor não encontrado', 404);
    }

    public function delete(int $id)
    {
        $supplier = Supplier::find($id);
        if ($supplier)
            return $supplier->delete();
        throw new \Exception('Fornecedor não encontrado', 404);
    }
}
