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
        $numberOfItemsPerPage = $filter['numberOfItemsPerPage'] ?? 3;

        if (!isset($filter['orderType'])) {
            $filter['orderType'] = 'desc';
            $filter['orderBy'] = 'created_at';
        }

        if (!isset($filter['search'])) {
            $filter['search'] = '';
        }
        if ($filter['orderBy'] && strlen($filter['search']) > 0) {
            return $this->model->where('name', 'like', '%' . $filter['search'] . '%')->orderBy($filter['orderBy'], $filter['orderType'])->paginate($numberOfItemsPerPage);
        }

        if ($filter['orderBy']) {
            return $this->model->orderBy($filter['orderBy'], $filter['orderType'])->paginate($numberOfItemsPerPage);
        }
        
        return $this->model->paginate($numberOfItemsPerPage);
    }
}
