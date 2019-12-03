<?php

namespace App\Repositories\Attribute;


use Illuminate\Support\Collection;

interface AttributeRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

}
