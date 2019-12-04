<?php

namespace App\Repositories\Product;


use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbProductRepository implements ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * DbProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Returns created product
     *
     * @param array $request
     * @return Product
     * @throws \Throwable
     */
    public function create(array $request): Product
    {
        return Capsule::connection()->transaction(function () use ($request) {
            /** @var Product $product */
            $product = $this->model->create($request);
            $product->productAttributes()->sync($request['attributes'] ?? []);

            return $product;
        });
    }

    /**
     * Returns true if product success updated
     *
     * @param int $id
     * @param array $request
     * @return bool
     * @throws \Throwable
     */
    public function update(int $id, array $request): bool
    {
        return Capsule::connection()->transaction(function () use ($id, $request) {
            $product = $this->getById($id);
            $product->productAttributes()->sync($request['attributes'] ?? []);

            return $product->update($request);
        });
    }

    /**
     * Delete product by given id
     *
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->model->newQuery()
            ->where('id', $id)
            ->delete();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function getById(int $id): ?Product
    {
        return $this->model
                ->where('id', $id)
                ->first();
    }
}
