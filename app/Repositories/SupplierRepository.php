<?php

namespace App\Repositories;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Models\Supplier;

class SupplierRepository extends CRUDRepository implements ISupplierRepository
{
    public function __construct(private readonly Supplier $model)
    {
        parent::__construct($model);
    }

    public function getAll(array $filter = null)
    {
        return $this->model->paginate();
    }
}
