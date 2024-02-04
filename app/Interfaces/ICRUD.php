<?php

namespace App\Interfaces;

interface ICRUD
{
    public function getAll(array $filter = null): array;

    public function getById(int $id): object;

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);
}
