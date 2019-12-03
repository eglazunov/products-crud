<?php

namespace App\Providers;


use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\DbProductRepository;

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