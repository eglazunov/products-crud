<?php

namespace App\Providers;


use App\Repositories\ProductRepository;
use App\Repositories\DbProductRepository;

class ProductRepositoryProvider extends Provider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->container->bind(ProductRepository::class, DbProductRepository::class);
    }
}