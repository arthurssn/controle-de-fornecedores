<?php

namespace App\Http\Controllers\Api;

use App\DTO\SupplierDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindSupplierRequest;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Interfaces\Supplier\ISupplierService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function __construct(private readonly ISupplierService $service)
    {
    }

    public function index(FindSupplierRequest $request)
    {
        sleep(1);
        try {
            $suppliersData = $this->service->getAll($request->all());
            if (isset($suppliersData['qsa'])) {
                return response()->json(new SupplierDTO($suppliersData));
            }

            foreach ($suppliersData as $key => $supplierData) {
                $suppliersData[$key] = new SupplierDTO($supplierData);
            }
            return $suppliersData;

        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response($exception->getMessage(), 404);
        }
    }

    public function show(int $id)
    {
        try {
            return response(new SupplierResource($this->service->getById($id)), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), $exception->getCode() > 400 && $exception->getCode() < 600 ? $exception->getCode() : 500);
        }
    }

    public function store(SupplierRequest $request)
    {
        try {
            return response()->json(['data' => $this->service->create($request->all())], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode() > 400 && $exception->getCode() < 600 ? $exception->getCode() : 500);
        }
    }

    public function update(SupplierRequest $request, int $id)
    {
        try {
            return response($this->service->update($request->all(), $id), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode() > 400 && $exception->getCode() < 600 ? $exception->getCode() : 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            return response($this->service->delete($id), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode() > 400 && $exception->getCode() < 600 ? $exception->getCode() : 500);
        }
    }
}
