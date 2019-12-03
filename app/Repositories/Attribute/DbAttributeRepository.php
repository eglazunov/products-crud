<?php

namespace App\Repositories\Attribute;


use App\Models\Attribute;
use Illuminate\Support\Collection;

class DbAttributeRepository implements AttributeRepository
{
    /**
     * @var Attribute
     */
    private $model;

    /**
     * DbProductRepository constructor.
     * @param Attribute $model
     */
    public function __construct(Attribute $model)
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

}
