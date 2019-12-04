<?php

namespace App\Repositories\Product;


use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepository
{
    /**
     * Returns created product
     *
     * @param array $request
     * @return Product
     * @throws \Throwable
     */
    public function create(array $request): Product;

    /**
     * Returns true if product success updated
     *
     * @param int $id
     * @param array $request
     * @return bool
     * @throws \Throwable
     */
    public function update(int $id, array $request): bool;

    /**
     * Delete product by given id
     *
     * @param int $id
     */
    public function delete(int $id): void;

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
