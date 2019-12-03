<?php

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return Product|null
     */
    public function getById(int $id): ?Product;
}
