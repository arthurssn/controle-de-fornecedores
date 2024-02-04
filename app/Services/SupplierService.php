<?php

namespace App\Services;

use App\Interfaces\Supplier\ISupplierRepository;
use App\Interfaces\Supplier\ISupplierService;

class SupplierService extends CRUDService implements ISupplierService
{
    public function __construct(ISupplierRepository $repository)
    {
        parent::__construct($repository);
    }
}
