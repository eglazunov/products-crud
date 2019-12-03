<?php

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Support\Collection;

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
