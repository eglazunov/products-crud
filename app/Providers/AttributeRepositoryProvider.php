<?php

namespace App\Providers;


use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\Attribute\DbAttributeRepository;

class AttributeRepositoryProvider extends Provider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->container->bind(AttributeRepository::class, DbAttributeRepository::class);
    }
}