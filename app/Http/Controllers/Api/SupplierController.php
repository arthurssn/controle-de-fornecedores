<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Interfaces\Supplier\ISupplierService;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    public function __construct(private readonly ISupplierService $service)
    {
    }

    public function index()
    {
        try {
            return response(SupplierResource::collection($this->service->getAll()), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), $exception->getCode());
        }
    }

    public function show(int $id)
    {
        try {
            return response(new SupplierResource($this->service->getById($id)), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), $exception->getCode());
        }
    }

    public function store(SupplierRequest $request)
    {
        try {
            return response()->json(['data' => $this->service->create($request->all())], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(SupplierRequest $request, int $id)
    {
        try {
            return response($this->service->update($request->all(), $id), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function destroy(int $id)
    {
        try {
            return response($this->service->delete($id), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}