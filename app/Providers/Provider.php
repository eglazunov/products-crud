<?php

namespace App\Providers;


use Illuminate\Container\Container;

abstract class Provider
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * ProductRepositoryProvider constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    abstract public function register();
}