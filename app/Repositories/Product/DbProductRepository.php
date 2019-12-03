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

    public function create(array $request): Product
    {
        return Capsule::connection()->transaction(function () use ($request) {
            /** @var Product $product */
            $product = $this->model->create($request);
            $product->attributes()->sync($request['attributes'] ?? []);

            return $product;
        });
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
